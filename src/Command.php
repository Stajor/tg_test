<?php namespace Telegram\Bot;

use Telegram\Bot\Types\Message;
use Telegram\Bot\Types\Update;

abstract class Command {
    protected $name;
    protected $description;
    private $api;
    private $payload;

    abstract public function handle();

    public function getName() {
        return $this->name;
    }

    public function setApi(Api $api) {
        $this->api = $api;
    }

    public function getApi(): Api {
        return $this->api;
    }

    public function setPayload(Payload $payload) {
        $this->payload = $payload;
    }

    public function getPayload(): Payload {
        return $this->payload;
    }

    public function replyWithMessage($params) {
        $params['chat_id'] = $this->getPayload()->getChat()->id;

        return $this->getApi()->sendMessage($params);
    }

    public function replyWithAction(string $action) {
        return $this->getApi()->sendChatAction(['chat_id' => $this->getPayload()->getChat()->id, 'action' => $action]);
    }
}