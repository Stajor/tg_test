<?php namespace Telegram\Bot\Types;

use Telegram\Bot\Type;

class ReplyKeyboardMarkup extends Type {
    protected $meta = [
        'keyboard' => KeyboardButton::class
    ];

    public $keyboard;
    public $resize_keyboard;
    public $one_time_keyboard;
    public $selective;
}