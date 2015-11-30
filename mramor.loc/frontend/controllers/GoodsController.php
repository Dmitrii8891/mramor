<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Stone;
use common\models\Goods;
use common\models\StoneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use common\models\Category;

class GoodsController extends Controller
{


    public function actionIndex()
    {
        $query = Category::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query

        ]);
        return $this->render('index', [

            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($translit)
    {

        $model = $this->findModel($translit);
        $query = Goods::find()->where(['status'=>'availability', 'category_id'=>$model->id]);
        $availableDataProvider = new ActiveDataProvider([
            'query' => $query

        ]);

        return $this->render('view', [
            'model' => $this->findModel($translit),
            'availableDataProvider' => $availableDataProvider
            //'dataProvider' => $dataProvider,
        ]);


    }


    protected function findModel($translit)
    {
        if (($model = Category::findOne(["translit"=>$translit])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findGoodsModel($translit)
    {
        if (($model = Goods::findOne(["translit"=>$translit])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionAjaxFilter(){

            $post = Yii::$app->request->get();

            $query = Stone::find();

            if($post) {
                if(isset($post['filter_one'])){
                    $query->andWhere(["filter_one"=>$post['filter_one']]);
                }
                if(isset($post['filter_two'])){
                    $query->andWhere(["filter_two"=>$post['filter_two']]);
                }
                if(isset($post['filter_three'])){
                    $query->andWhere(["filter_one"=>$post['filter_three']]);
                }
            }
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 6,
                ],

            ]);

            if(!isset($post['page'])){

                Pjax::begin();
                echo ListView::widget( [
                    'dataProvider' => $dataProvider,
                    'itemView'=>'@app/views/stone/_stone',
                    'summary'=>'',
                    'layout' => "<div id='items' class='catalog-kamen-img-text-wrap'>{items}</div><div id='pagination' class='pager-block'>{pager}</div>"
                ] );
                Pjax::end();
                exit;
            }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
            ],

        ]);
        return $this->render('index', [

            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionOneItem($translit){
        $this->layout = '/column2';

        return $this->render('one-item', [
            'model' => $this->findGoodsModel($translit),
        ]);
    }

    public function actionAvailability(){

        $query = Goods::find()->where(['status'=>'availability']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query

        ]);


        return $this->render('availability', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionObjects()
    {
        $this->layout = '/column3';

        $query = Goods::find()->where(['status'=>'objects']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query

        ]);

        return $this->render('objects', [
            'dataProvider' => $dataProvider,
        ]);
    }



}
