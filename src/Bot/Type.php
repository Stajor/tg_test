<?php namespace Telegram\Bot;

class Type {
    public function __construct(array $data) {
        foreach ($data AS $key => $value) {
            $this->add($key, $value);
        }
    }

    protected function add($key, $value) {
        if (property_exists($this, $key)) {
            $this->{$key} = $value;
        }
    }
}