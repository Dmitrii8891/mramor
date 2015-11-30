<?php

namespace backend\controllers;

use backend\models\ItemsCarData;
use Yii;
use yii\filters\AccessControl;
use backend\models\Items;
use backend\models\ItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * ItemsController implements the CRUD actions for Items model.
 */
class ItemsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','create','update','view','delete','test-img' ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Items models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Items model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Items model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model    = new Items();
        $modelICD = new ItemsCarData();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $post = Yii::$app->request->post();
            foreach($post['ItemsCarData'] as $k => $v){
                $services = new ItemsCarData();
                $v['item_id'] = $model->id;
                $v['status'] = '1';
                $load['ItemsCarData'] = $v;
                $services->load($load);
                $services->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelICD' => $modelICD
            ]);
        }
    }

    /**
     * Updates an existing Items model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelICD = ItemsCarData::find('item_id ='.$id)->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            foreach($modelICD as $data){
                $data->status = 0;
                $data->save();
            }

            $post = Yii::$app->request->post();
            foreach($post['ItemsCarData'] as $k => $v){
                $services = ItemsCarData::find()
                    ->where(['car_id'=> $v['car_id'], 'item_id'=> $id])
                    ->one();

                if(!$services instanceof ItemsCarData){

                    $services = new ItemsCarData();
                    $v['item_id'] = $model->id;
                    $v['status'] = '1';
                    $load['ItemsCarData'] = $v;
                    $services->load($load);
                    $services->save();
                } else {
                    $v['item_id'] = $model->id;
                    $v['status'] = '1';
                    $load['ItemsCarData'] = $v;
                    $services->load($load);
                    $services->update();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('update', [
                'model'    => $model,
                'modelICD' => $modelICD
            ]);
        }
    }

    /**
     * Deletes an existing Items model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionTestImg()
    {
        $model = new Items();

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');
            $md5_file = md5_file($model->file->tempName);
            $imgDir = Yii::getAlias('@storage/cars/'.$md5_file.'/');
            $imageAlias = Yii::getAlias($imgDir.'412x275'.'.'.$model->file->extension);
            $imageLink = '/storage/cars/'.$md5_file.'/412x275'.'.'.$model->file->extension;
            if(!is_dir($imgDir)) {
                mkdir($imgDir, 0777, true);
            }
            $model->file->saveAs($imageAlias);
            Image::thumbnail($imageAlias, 412, 275, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET)
                ->save(Yii::getAlias($imageAlias), ['quality' =>
                    50]);

            return json_encode(['link'=>$imageLink]);

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
