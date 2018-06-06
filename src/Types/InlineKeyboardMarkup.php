<?php namespace Telegram\Bot\Types;

use Telegram\Bot\Type;

class InlineKeyboardMarkup extends Type {
    protected $meta = [
        'inline_keyboard' => InlineKeyboardButton::class
    ];

    public $inline_keyboard;
}