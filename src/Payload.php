<?php namespace Telegram\Bot;

use Telegram\Bot\Types\Update;

class Payload {
    private $messagesKeys = ['message', 'edited_message', 'channel_post', 'edited_channel_post'];
    private $update;
    private $message;

    public function __construct(Update $update) {
        $this->update = $update;

        $this->setMessage();
    }

    private function setMessage() {
        foreach ($this->messagesKeys AS $key) {
            if (isset($this->update->{$key})) {
                $this->message = $this->update->{$key};
            }
        }
    }
}