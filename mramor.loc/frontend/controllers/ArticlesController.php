<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Articles;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;

class ArticlesController extends Controller
{

    public function actionIndex()
    {
        $this->layout = '/column3';
        if (\Yii::$app->request->post()) {
            die(print_r(\Yii::$app->request->post()));
        }
        $dataProvider = new ActiveDataProvider([
            'query' => Articles::find(),
            'pagination' => [
                'pageSize' => 5,
            ],

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


    /**
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($translit)
    {

        if (($model = Articles::findOne(["translit"=>$translit])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}