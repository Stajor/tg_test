<?php namespace Telegram\Bot\Test\Api;

use PHPUnit\Framework\TestCase;

class ApiTestCase extends TestCase {
    protected static $api;

    public static function setUpBeforeClass() {
        self::$api = new Api('528001940:AAEcezPYlaRHFBT0dJsdqc3HDFok0uPXz1E');
    }
}