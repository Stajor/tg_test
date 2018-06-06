<?php namespace Telegram\Bot;

use Telegram\Bot\Types\Message;
use Telegram\Bot\Types\User;
use GuzzleHttp\Client;

class Api {
    const API_URL = 'https://api.telegram.org';

    protected $token;
    protected $client;

    public function __construct(string $token) {
        $this->token = $token;
        $this->client = new Client();
    }

    public function getMe(): User {
        return $this->request('getMe', [], User::class);
    }

    public function sendMessage(array $params): Message {
        return $this->request('sendMessage', $params, Message::class);
    }

    public function forwardMessage(array $params): Message {
        return $this->request('forwardMessage', $params, Message::class);
    }

    public function sendPhoto(array $params): Message {
        return $this->request('sendPhoto', $params, Message::class);
    }

    public function sendAudio(array $params): Message {
        return $this->request('sendAudio', $params, Message::class);
    }

    public function sendDocument(array $params): Message {
        return $this->request('sendDocument', $params, Message::class);
    }

    public function sendVideo(array $params): Message {
        return $this->request('sendVideo', $params, Message::class);
    }

    public function sendVoice(array $params): Message {
        return $this->request('sendVoice', $params, Message::class);
    }

    public function sendVideoNote(array $params): Message {
        return $this->request('sendVideoNote', $params, Message::class);
    }

    public function sendMediaGroup(array $params): Message {
        return $this->request('sendMediaGroup', $params, Message::class);
    }

    public function sendLocation(array $params): Message {
        return $this->request('sendLocation', $params, Message::class);
    }

    public function editMessageLiveLocation(array $params): Message {
        return $this->request('editMessageLiveLocation', $params, Message::class);
    }

    public function stopMessageLiveLocation(array $params): Message {
        return $this->request('stopMessageLiveLocation', $params, Message::class);
    }

    public function sendVenue(array $params): Message {
        return $this->request('sendVenue', $params, Message::class);
    }

    public function sendContact(array $params): Message {
        return $this->request('sendContact', $params, Message::class);
    }

    public function sendChatAction(array $params): bool {
        return $this->request('sendChatAction', $params);
    }

    public function request(string $method, array $params, $type = null) {
        if (isset($params['reply_markup']) && !empty($params['reply_markup'])) {
            $params['reply_markup'] = (string)$params['reply_markup'];
        }

        $result = $this->client->request('POST', self::API_URL."/bot{$this->token}/{$method}", ['form_params' => $params]);
        $data = json_decode($result->getBody()->getContents(), true);

        return is_null($type) ? $data['result'] : new $type($data['result']);
    }
}