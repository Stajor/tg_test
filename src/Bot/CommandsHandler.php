<?php namespace Telegram\Bot;

use Symfony\Component\HttpFoundation\Request;

class CommandsHandler {
    protected $commands = [];
    protected $fallback;
    protected $request;

    public function __construct(string $token) {
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

    public function handle() {
        file_put_contents('/var/www/feedman/shared/storage/logs/request.log', var_export($_POST, true), FILE_APPEND);

    }
}