<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\Events;
use common\models\EventsSearch;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class EventsController extends Controller{
    public function actionIndex()
    {
        $this->layout = '/column3';
        $query = Events::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query

        ]);
        return $this->render('index', [

            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($translit)
    {
        $this->layout = '/column2';
        return $this->render('view', [
            'model' => $this->findModel($translit),
        ]);


    }
    protected function findModel($translit)
    {
        if (($model = Events::findOne(["translit"=>$translit])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}