<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entity\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{

    public static function getBasket($session_id) {
        $sql = "SELECT basket.id basket_id, products.id prod_id, products.name, products.description, products.price FROM `basket`,`products` WHERE `session_id` = :session_id AND basket.product_id = products.id";
        return App::call()->db->queryAll($sql, ['session_id' => $session_id]);
    }

    protected function getTableName()
    {
        return 'basket';
    }


    protected function getEntityClass()
    {
        return Basket::class;
    }
}