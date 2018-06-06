<?php namespace Telegram\Bot;

use Telegram\Bot\Types\Message;
use Telegram\Bot\Types\Update;

abstract class Command {
    protected $name;
    protected $description;
    private $update;
    private $api;
    private $message;

    abstract public function handle();

    public function getName() {
        return $this->name;
    }

    public function setApi(Api $api): void {
        $this->api = $api;
    }

    public function getApi(): Api {
        return $this->api;
    }

    public function setMessage(Message $message) {
        $this->message = $message;
    }

    public function getMessage(): Message {
        return $this->message;
    }

    public function setUpdate(Update $update): void {
        $this->update = $update;
    }

    public function getUpdate(): Update {
        return $this->update;
    }
}