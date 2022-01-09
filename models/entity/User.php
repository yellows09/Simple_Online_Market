<?php

namespace app\models\entity;

use app\models\Entity;

class User extends Entity
{
    public $id;
    public $login;
    public $pass;

    protected $props = [
        'login' => false,
        'pass' => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }


}