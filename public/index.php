<?php
session_start();

use app\engine\App;


$config = include "../config/config.php";

require_once '../vendor/autoload.php';
App::call()->run($config);

//try {
//    App::call()->run($config);
//
//} catch (\PDOException $e) {
//    var_dump($e);
//} catch (\Exception $e) {
//    var_dump($e->getTrace());
//}







