<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Page;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;

class PageController extends Controller
{

    public $layout='/column2';
    public function actionShow()
    {
        $model = new Page;
        if(!$page = $model->getPageTranslit($_GET['translit']))
            throw new \Exception(404,'The requested page does not exist.');
        return $this->render('show',['page'=>$page]);
    }
}