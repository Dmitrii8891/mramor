<?php

namespace frontend\controllers;

use Yii;
use common\models\StandardServices;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;

class StandardServicesController extends Controller
{



    public function actionIndex()
    {
        $this->layout = '/column3';
        $dataProvider = new ActiveDataProvider([
            'query' => StandardServices::find()
        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($translit)
    {


        return $this->render('view', [
            'model' => $this->findModel($translit),
        ]);
    }


    protected function findModel($translit)
    {
        if (($model = StandardServices::findOne(["translit"=>$translit])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}