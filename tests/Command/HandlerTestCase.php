<?php namespace Telegram\Bot\Test\Command;

use PHPUnit\Framework\TestCase;
use Telegram\Bot\CommandsHandler;

class HandlerTestCase extends TestCase {
    /** @var CommandsHandler $handler */
    protected static $handler;

    public static function setUpBeforeClass() {
        self::$handler = new CommandsHandler('528001940:AAEcezPYlaRHFBT0dJsdqc3HDFok0uPXz1E');
    }
}