<?php namespace Telegram\Bot\Test\Command;

class CallbackHandlerTest extends HandlerTestCase {
    protected static $command;

    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();

        $input = '{"update_id":18310031, "callback_query":{"id":"184076319157951","from":{"id":42858,"is_bot":false,"first_name":"Alex","last_name":"B","username":"AlexBel","language_code":"en-IL"},"message":{"message_id":735,"from":{"id":528001940,"is_bot":true,"first_name":"agFetcher12","username":"agFetcher12Bot"},"chat":{"id":42858,"first_name":"Alex","last_name":"B","username":"AlexBel","type":"private"},"date":1528314475,"text":"\u0414\u043e\u0441\u0442\u0443\u043f\u043d\u044b\u0435 \u043a\u043e\u043c\u0430\u043d\u0434\u044b:"},"chat_instance":"5608841909552825909","data":"/test"}}';

        self::$handler->setInput(json_decode($input, true));
        self::$handler->addCommand(TestCommand::class);

        self::$command = self::$handler->handle();
    }

    public function testHandleCommand() {
        $this->assertInstanceOf(TestCommand::class, self::$command);
    }
}