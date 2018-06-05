<?php namespace Telegram\Bot\Types;

use Telegram\Bot\Type;

class ReplyKeyboardRemove extends Type {
    public $remove_keyboard;
    public $selective;
}