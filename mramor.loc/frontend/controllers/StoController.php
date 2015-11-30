<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Sto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;

class StoController extends Controller
{

    public $layout='/column2';

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Sto::find(),
            'pagination' => [
                'pageSize' => 5,
            ],

        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {


        $dataProvider = new ArrayDataProvider([
            'allModels' => Sto::find()->limit(10)->all()
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Finds the Sto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}