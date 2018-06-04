<?php namespace Telegram\Bot;

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

    /**
     * @link https://core.telegram.org/bots/api#getme
     * @return User
     */
    public function getMe() {
        return $this->request('getMe', [], User::class);
    }

    public function request(string $method, array $params, $type = null) {
        $result = $this->client->request('POST', self::API_URL."/bot{$this->token}/{$method}", ['form_params' => $params]);
        $data = json_decode($result->getBody()->getContents(), true);

        return new $type($data['result']);
    }
}