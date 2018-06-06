<?php namespace Telegram\Bot\Test\Command;

use Telegram\Bot\Command;

class TestCommand extends Command {
    protected $name = "test";
    protected $description = "Test Command";

    public function handle() {
//        $this->replyWithMessage(['text' => trans('bot.start'), 'parse_mode' => 'HTML']);
//        $this->replyWithChatAction(['action' => Actions::TYPING]);
//
//        usleep(500);
//        $this->triggerCommand('help');
    }
}