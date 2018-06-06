<?php namespace Telegram\Bot;

use Symfony\Component\HttpFoundation\Request;
use Telegram\Bot\Types\Message;
use Telegram\Bot\Types\Update;

class CommandsHandler {
    private $commands = [];
    private $fallback;
    private $request;
    private $input;
    private $token;
    private $messagesKeys = ['message', 'edited_message', 'channel_post', 'edited_channel_post'];

    public function __construct(string $token) {
        $this->token = $token;
        $this->request = new Request();
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


        $message = $this->getMessage($update);

        $command = $this->getCommand($update, $message);
        $command->setApi(new Api($this->token));
        $command->setUpdate($update);
        $command->setMessage($message);

        $command->handle();

        return $command;
    }

    private function getMessage(Update $update): Message {
        foreach ($this->messagesKeys AS $key) {
            if (isset($update->{$key})) {
                return $update->{$key};
            }
        }
    }

    private function getText(Update $update, Message $message) {
        $text = '';

        if (!empty($message->text)) {
            $text = $message->text;
        } elseif(!empty($update->callback_query) && !empty($update->callback_query->data)) {
            $text = $update->callback_query->data;
        }

        return $text;
    }

    private function getCommand(Update $update, Message $message): Command {
        $text = $this->getText($update, $message);

        foreach ($this->commands AS $command) {
            /** @var Command $cmd */
            $cmd = new $command();

            if (strpos($text, "/{$cmd->getName()}", 0) === 0) {
                return $cmd;
            }
        }
    }
}