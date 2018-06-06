<?php namespace Telegram\Bot\Test\Api;

use PHPUnit\Framework\TestCase;
use Telegram\Bot\Api;

class ApiTestCase extends TestCase {
    /** @var Api */
    protected static $api;
    protected static $chatId = 42858;

    public static function setUpBeforeClass() {
        self::$api = new Api('528001940:AAEcezPYlaRHFBT0dJsdqc3HDFok0uPXz1E');
    }
}