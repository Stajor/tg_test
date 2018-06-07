<?php namespace Telegram\Bot;

use Telegram\Bot\Types\Update;

class CommandsHandler {
    private $commands = [];
    private $fallback;
    private $input;
    private $token;

    public function __construct(string $token) {
        $this->token = $token;
    }

    public function addCommand(string $command) {
        $this->commands[] = $command;

        return $this;
    }

    public function addFallbackCommand(string $fallback) {
        $this->fallback = $fallback;

        return $this;
    }

    public function getInput() {
        return $this->input;
    }

    public function setInput(array $input) {
        $this->input = $input;
    }

    public function handle(): Command {
        if (empty($this->getInput())) {
            $input = file_get_contents('php://input');
            $this->setInput(json_decode($input, true));
        }

        $update     = new Update($this->getInput());
        $payload    = new Payload($update);

        return $this->triggerCommand($payload);
    }

    public function triggerCommand(Payload $payload, string $command = null): Command {
        $command = $this->getCommand($payload, $command);

        $command->setApi(new Api($this->token));
        $command->setPayload($payload);
        $command->setHandler($this);
        $command->handle();

        return $command;
    }

    private function getCommand(Payload $payload, string $command = null): Command {
        if (is_null($command)) {
            $messageText    = $payload->getMessage()->text;
            $queryText      = is_null($payload->getCallbackQuery()) ? null : $payload->getCallbackQuery()->data;
        } else {
            $messageText = $command;
        }

        foreach ($this->commands AS $command) {
            /** @var Command $cmd */
            $cmd = new $command();

            if (strpos($messageText, "/{$cmd->getName()}", 0) === 0) {
                return $cmd;
            } elseif (!is_null($queryText) && strpos($queryText, "/{$cmd->getName()}", 0) === 0) {
                return $cmd;
            }
        }

        return null;
    }
}