<?php namespace Telegram\Bot\Types;

use Telegram\Bot\Type;

class Update extends Type {
    protected $meta = [
        'message'               => Message::class,
        'edited_message'        => Message::class,
        'channel_post'          => Message::class,
        'edited_channel_post'   => Message::class,
        'inline_query'          => InlineQuery::class,
        'chosen_inline_result'  => ChosenInlineResult::class,
        'callback_query'        => CallbackQuery::class,
        'shipping_query'        => ShippingQuery::class,
        'pre_checkout_query'    => PreCheckoutQuery::class
    ];

    public $update_id;
    public $message;
    public $edited_message;
    public $channel_post;
    public $edited_channel_post;
    public $inline_query;
    public $chosen_inline_result;
    public $callback_query;
    public $shipping_query;
    public $pre_checkout_query;
}