<?php namespace Telegram\Bot\Test\Command;

use Telegram\Bot\Api;
use Telegram\Bot\Command;
use Telegram\Bot\Types\Message;
use Telegram\Bot\Types\Update;

class HandlerTest extends HandlerTestCase {
    protected function setUp() {

    }

    public function testHandleStartCommand() {
        $input = '{"update_id":18310025,"message":{"message_id":536,"from":{"id":42858,"is_bot":false,"first_name":"Alex","last_name":"B","username":"AlexBel","language_code":"en-IL"},"chat":{"id":42858,"first_name":"Alex","last_name":"B","username":"AlexBel","type":"private"},"date":1528143652,"text":"/start","entities":[{"offset":0,"length":5,"type":"bot_command"}]}}';

        self::$handler->setInput(json_decode($input, true));
        self::$handler->addCommand(StartCommand::class);
        $command = self::$handler->handle();

        $this->assertInstanceOf(StartCommand::class, $command);
        $this->assertInstanceOf(Api::class, $command->getApi());
        $this->assertInstanceOf(Update::class, $command->getUpdate());
        $this->assertInstanceOf(Message::class, $command->getMessage());
    }
}

class StartCommand extends Command {
    protected $name = "start";
    protected $description = "Start Command";

    public function handle() {
//        $this->replyWithMessage(['text' => trans('bot.start'), 'parse_mode' => 'HTML']);
//        $this->replyWithChatAction(['action' => Actions::TYPING]);
//
//        usleep(500);
//        $this->triggerCommand('help');
    }
}