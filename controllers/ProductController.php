<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\ProductRepository;
use app\engine\App;

class ProductController extends Controller
{


    public function actionIndex()
    {

        echo $this->render('index');
    }

    public function actionCatalog()
    {
       // $catalog = Product::getAll();


        $page = App::call()->request->getParams()['page'] ?? 0;

        $catalog = App::call()->productRepository->getLimit(($page + 1) * 4); //2  4 6 8

        echo $this->render('product/catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {

        //$id = $_GET['id'];
        $id = App::call()->request->getParams()['id'];


        $product = App::call()->productRepository->getOne($id);

        echo $this->render('product/card', [
            'product' => $product
        ]);
    }


}