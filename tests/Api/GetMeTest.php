<?php namespace Telegram\Bot\Api\Test;

use PHPUnit\Framework\TestCase;
use Telegram\Bot\Api;
use Telegram\Bot\Types\User;

class GetMeTest extends TestCase {
    protected $user;

    public function __construct(string $name = null, array $data = [], string $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $api = new Api('528001940:AAEcezPYlaRHFBT0dJsdqc3HDFok0uPXz1E');
        $this->user = $api->getMe();
    }

    public function testHasInstanceOfUser() {
        $this->assertInstanceOf(User::class, $this->user);
    }

    public function testHasAttributes() {
        $this->assertObjectHasAttribute('id', $this->user);
        $this->assertObjectHasAttribute('is_bot', $this->user);
        $this->assertObjectHasAttribute('first_name', $this->user);
        $this->assertObjectHasAttribute('last_name', $this->user);
        $this->assertObjectHasAttribute('username', $this->user);
        $this->assertObjectHasAttribute('language_code', $this->user);
    }
}