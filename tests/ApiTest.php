<?php namespace Telegram\Bot\Test;

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase {
    public function testEqualString() {
        $this->assertEquals('abc', 'abc');
    }
}
