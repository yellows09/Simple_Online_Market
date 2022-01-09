<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\entity\Basket;
use app\models\repositories\BasketRepository;

class BasketController extends Controller
{
    public function actionIndex() {
        $session_id = session_id();

        $basket = App::call()->basketRepository->getBasket($session_id);

        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

    public function actionDelete() {
        $id = App::call()->request->getParams()['id'];
        $session_id = session_id();
        $status = 'ok';

        $basket  = App::call()->basketRepository->getOne($id);
        if ($session_id == $basket->session_id) {
            App::call()->basketRepository->delete($basket);
        } else {
            $status = 'error';
        }


        $response = [
            'status' => $status,
            'count' => (new BasketRepository())->getCountWhere('session_id', $session_id)
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionAdd() {
        //$id = $_POST['id'];
        $id = App::call()->request->getParams()['id'];
        $session_id = session_id();

        $basket = new Basket($session_id, $id);
        App::call()->basketRepository->save($basket);


        $response = [
            'status' => 'ok',
            'count' => App::call()->basketRepository->getCountWhere('session_id', $session_id)
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}