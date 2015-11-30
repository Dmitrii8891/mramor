<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\Cars;
use backend\models\CarsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\UploadedFile;
use backend\models\StandardServices;
use backend\models\ChengedServices;

/**
 * CarsController implements the CRUD actions for Cars model.
 */
class CarsController extends Controller
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
     * Lists all Cars models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cars model.
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
     * Creates a new Cars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cars();
        $modelSS = StandardServices::find()->all();

        if ($model->load(Yii::$app->request->post())) {

            $post = Yii::$app->request->post();

            $model->save();

            foreach($post['ModelSS'] as $k => $v){
                $services = new ChengedServices();
                $v['status'] = !empty($v['status']) ? $v['status'] : '0';
                $v['service_id'] = $k;
                $v['car_id'] = $model->id;
                $load['ChengedServices'] = $v;
                $services->load($load);
                $services->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);

        } else {

            return $this->render('create', [
                'model' => $model,
                'modelSS'=> $modelSS
            ]);
        }
    }

    /**
     * Updates an existing Cars model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelCS = ChengedServices::find('car_id ='.$id)->all();



        if ($model->load(Yii::$app->request->post()) &&  $model->save()) {
            foreach($model->getChangedServices()->all() as $item){
                $item->delete();
            }
            $post = Yii::$app->request->post();
            foreach($post['ModelSS'] as $k => $v){
                $services = new ChengedServices();
                $v['status'] = !empty($v['status']) ? $v['status'] : '0';
                $v['service_id'] = $k;
                $v['car_id'] = $model->id;
                $load['ChengedServices'] = $v;
                $services->load($load);
                $services->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            $modelSS = StandardServices::find('car_id ='.$id)->all();

            return $this->render('update', [
                'model' => $model,
                'modelCS'=> $modelCS,
                'modelSS' => $modelSS

            ]);
        }
    }

    /**
     * Deletes an existing Cars model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        foreach($model->getItemCar()->all() as $item){
            $item->delete();
        }
        foreach($model->getChangedServices()->all() as $item){
            $item->delete();
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    public function actionTestImg()
    {
        $model = new Cars();

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');
            $md5_file = md5_file($model->file->tempName);
            $imgDir = Yii::getAlias('@storage/cars/'.$md5_file.'/');
            $imageAlias = Yii::getAlias($imgDir.'120x120'.'.'.$model->file->extension);
            $imageLink = '/storage/cars/'.$md5_file.'/120x120'.'.'.$model->file->extension;
            if(!is_dir($imgDir)) {
                mkdir($imgDir, 0777, true);
            }
            $model->file->saveAs($imageAlias);
            Image::thumbnail($imageAlias, 120, 120)
                ->save(Yii::getAlias($imageAlias), ['quality' =>
                    100]);

            return json_encode(['link'=>$imageLink]);

        }
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
