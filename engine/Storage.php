<?php

namespace app\engine;

class Storage
{
    protected $items = [];// ['Db' => new Db(), 'Request' => new Request()]


    public function set($key, $obj) {
        $this->items[$key] = $obj;
    }

    public function get($key) {
        if (!isset($this->items[$key])) {
            $this->items[$key] = App::call()->createComponent($key);
        }
        return $this->items[$key];
    }
}