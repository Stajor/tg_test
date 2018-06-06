<?php namespace Telegram\Bot\Test\Api;

use Telegram\Bot\Types\User;

class GetMeTest extends ApiTestCase {
    protected $user;

    protected function setUp() {
        $this->user = self::$api->getMe();
    }

    public function provider() {
        return [['id'], ['is_bot'], ['first_name'], ['last_name'], ['username'], ['language_code']];
    }

    public function testHasInstanceOfUser() {
        $this->assertInstanceOf(User::class, $this->user);
    }

    /**
     * @dataProvider provider
     * @param $attribute
     */
    public function testHasAttribute($attribute) {
        $this->assertObjectHasAttribute($attribute, $this->user);
    }
}