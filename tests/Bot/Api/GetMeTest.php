<?php namespace Telegram\Bot\Test\Api;

use PHPUnit\Framework\TestCase;
use Telegram\Bot\Api;
use Telegram\Bot\Types\User;

class GetMeTest extends TestCase {
    protected $user;

    protected function setUp() {
        $api = new Api('528001940:AAEcezPYlaRHFBT0dJsdqc3HDFok0uPXz1E');
        $this->user = $api->getMe();
    }

    public function provider() {
        return [['id'], ['is_bot'], ['first_name'], ['last_name'], ['username'], ['language_code']];
    }

    public function testHasInstanceOfUser() {
        $this->assertInstanceOf(User::class, $this->user);
    }

    /**
     * @dataProvider provider
     */
    public function testHasAttributes($attribute) {
        $this->assertObjectHasAttribute($attribute, $this->user);
    }
}