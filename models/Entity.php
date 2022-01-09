<?php

namespace app\models;



abstract class Entity
{
    protected $props = [];

    public function __set($name, $value)
    {
        //TODO проверить по props можно ли менять это поле, т.е. запретить создание новых свойств
        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name)
    {
        //TODO отдавать только существующие поля проверить по props
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

}