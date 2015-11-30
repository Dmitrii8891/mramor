<?php

namespace frontend\controllers;

use frontend\models\Cars;
use frontend\models\FilterForm;
use frontend\models\ItemsCarData;
use Yii;
use yii\filters\AccessControl;
use frontend\models\Items;
use frontend\models\ItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\widgets\ListView;
use yii\web\View;

class ItemsController extends Controller
{

    public $layout='/column3';

    public function actionIndex()
    {
        $car_id = (new Cars())->getActiveCarId();
        $filterFrom = FilterForm::getInstance();
        $filterFrom->setActiveCar();
        $get = Yii::$app->request->get();
        $query = Items::find();

        if($get) {
            $key = key($get);

            if($key == 'state' ){
                $query = Items::find()->where(['state'=>$get[$key]]);
                Yii::$app->session->set('state', $get[$key]);
            }
            if( $key == 'car_id' ) {

                $array = array();
                $items = ItemsCarData::find()->where(['car_id'=>$get[$key]])->all();

                foreach($items as $item){
                    $array[] = $item['item_id'];
                }

                $query->andWhere(['id'=>$array]);


                $filterFrom->setActiveCar($get[$key]);

            } else if($car_id) {
                $array = array();
                $items = ItemsCarData::find()->where(['car_id'=>$car_id])->all();
                foreach($items as $item){
                    $array[] = $item['item_id'];
                }
                $query->andWhere(['id'=>$array]);
            }
        }

        $searchModel = new ItemsSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],

        ]);


        return $this->render('index', [
            'state' => Yii::$app->session->get('state'),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $this->layout = '/column2';
        $carData = array();
        $ICdata = ItemsCarData::find()
            ->where(['item_id' => $id])
            ->all();

        if(!empty($ICdata)) {

            foreach($ICdata as $data){
                $carData[] = $data->getCar()->one();
            }
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => Items::find()->limit(10)->all()
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'carData' => $carData
        ]);
    }


    public function actionFilter()
    {
        $model = new FilterForm();

        if (\Yii::$app->request->get()) {

            $model->load(Yii::$app->request->get());
            Yii::$app->session->set('state', $model->state);

            $WModel= (new Items)->find();

            $WModel->where(['state'=>$model->state]);

            if($model->work_type){
                $WModel->andWhere(['work_type'=>$model->work_type]);
            }
            if($model->year){
                $WModel->andWhere(['year'=>$model->year]);
            }
            if($model->cars){
                $array = array();
                $items = ItemsCarData::find()->where(['car_id'=>$model->cars])->all();
                foreach($items as $item){
                    $array[] = $item['item_id'];
                }

                $WModel->andWhere(['id'=>$array]);
            }

            $dataProvider = new ActiveDataProvider([
                'query' => $WModel,
                'pagination' => [
                    'pageSize' => 5,
                ],
            ]);

            return $this->render('index', [
                'state' => $model->state,
                'dataProvider' => $dataProvider,
            ]);


        }


    }

    /**
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Items::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}