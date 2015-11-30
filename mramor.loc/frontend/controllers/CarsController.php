<?php

namespace frontend\controllers;

use frontend\models\ChengedServices;
use Yii;
use frontend\models\Cars;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;
use common\models\StoOrder;

class CarsController extends Controller
{
    public $layout='/column2';

    public function actionView($id)
    {
        $model = $this->findModel($id);

        $services = $model->getServices()->all();

        return $this->render('view', [
            'services' => $services,
            'model' => $model
        ]);
    }

    public function actionToOrder()
    {
        if(Yii::$app->request->post()){

            $post  = Yii::$app->request->post();
            $model = ChengedServices::find()->where(['id'=> $post['sto_service']])->all();
            $orderModel = new StoOrder();
            $orderModel->name = $post['Callback']['name'];
            $orderModel->phone_num = $post['Callback']['phone_num'];
            $orderModel->services = implode(',', $post['sto_service']);
            $orderModel->save();

        }

        return $this->redirect(['/']);
    }




    /**
     * Finds the Cars model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cars the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cars::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}