<?php
namespace app\controllers;

use yii\web\Controller;

class ShopController extends Controller{
    public function actionDelete(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id=$_GET['del'];
        print_r($id);
        die();
    }
}