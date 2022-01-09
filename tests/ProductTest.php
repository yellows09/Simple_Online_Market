<?php

use app\models\entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProduct() {
        $name = "Чай";
        $product = new Product($name);
        $this->assertEquals($name, $product->name);
    }
}