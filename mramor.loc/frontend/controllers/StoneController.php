<?php

namespace frontend\controllers;

use backend\models\Articles;
use backend\models\Colors;
use backend\models\Country;
use backend\models\TypeOfStone;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use common\models\Stone;
use common\models\StoneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use yii\widgets\Pjax;

class StoneController extends Controller
{
    public $layout='/column';




    public function actionIndex()
    {

        $query = Stone::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
            ],

        ]);

        $dataArticles = new ActiveDataProvider([
            'query' => Articles::find()->limit(3),

        ]);


        return $this->render('index', [

            'dataProvider' => $dataProvider,
            'dataArticles' =>$dataArticles,
        ]);
    }


    public function actionView($translit)
    {
        $this->layout = '/column2';
        $model = $this->findModel($translit);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $model->getGallery(),

        ]);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }



    protected function findModel($translit)
    {
        if (($model = Stone::findOne(["translit"=>$translit])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAjaxFilter(){


        $post = Yii::$app->request->get('filter');

        if(!empty($post)){

            $post = explode('/',$post);

            $res = array();
            foreach($post as $row){

                $sub_str = explode('=',$row);
                $res[$sub_str[0]] = $sub_str[1];
            }
            $post = $res;

        } else {
            return $this->redirect('/stone/index',301);
        }
        $query = Stone::find();

        if($post) {
            if(isset($post['assortment'])){

                $stone_id = TypeOfStone::find()->where(["translit"=>explode(';',$post['assortment'])])->all();
                $id = array();
                foreach($stone_id as $one_item){
                    $id[] = $one_item->id;
                }


                if($id){
                    $query->andWhere(["filter_one"=>$id]);
                }

            }
            if(isset($post['color'])){
                    str_replace('vse-cveta', '', $post['color'],  $count);
                    if(!$count){
                        $color_id = Colors::find('id')->where(["translit"=>explode(';',$post['color'])])->all();
                        $id = array();
                        foreach($color_id as $one_item){
                            $id[] = $one_item->id;
                        }


                        if($id){
                            $query->andWhere(["filter_two"=>$id]);
                        }
                    }



            }
            if(isset($post['country'])){
                $country_id = Country::find('id')->where(["translit"=>explode(';',$post['country'])])->all();
                $id = array();
                foreach($country_id as $one_item){
                    $id[] = $one_item->id;
                }


                if($id){
                    $query->andWhere(["filter_three"=>$id]);
                }
            }
        }

//
//            if(!isset($post['page'])){
//
//                Pjax::begin();
//                echo ListView::widget( [
//                    'dataProvider' => $dataProvider,
//                    'itemView'=>'@app/views/stone/_stone',
//                    'summary'=>'',
//                    'layout' => "<div id='items' class='catalog-kamen-img-text-wrap'>{items}</div><div id='pagination' class='pager-block'>{pager}</div>"
//                ] );
//                Pjax::end();
//                exit;
//            }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
            ],

        ]);
        $dataArticles = new ActiveDataProvider([
            'query' => Articles::find()->limit(3),

        ]);
        return $this->render('index', [

            'dataProvider' => $dataProvider,
            'dataArticles' =>$dataArticles,
        ]);
    }



}
