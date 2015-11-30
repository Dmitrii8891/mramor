<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Stone;
use common\models\StoneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\UploadedFile;
/**
 * StoneController implements the CRUD actions for Stone model.
 */
class StoneController extends Controller
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
                        'actions' => ['logout', 'index','create','update','view','delete','test-img', 'download-gallery' ],
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
     * Lists all Stone models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StoneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Stone model.
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
     * Creates a new Stone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Stone();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Stone model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Stone model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Stone model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stone the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Stone::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionTestImg()
    {
        $model = new Stone();

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');
            $md5_file = md5_file($model->file->tempName);
            $imgDir = Yii::getAlias('@storage/cars/'.$md5_file.'/');
            $imageAlias = Yii::getAlias($imgDir.'220x147'.'.'.$model->file->extension);
            $imageLink = '/storage/cars/'.$md5_file.'/220x147'.'.'.$model->file->extension;
            if(!is_dir($imgDir)) {
                mkdir($imgDir, 0777, true);
            }
            $model->file->saveAs($imageAlias);
            Image::thumbnail($imageAlias, 220, 147, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET)
                ->save(Yii::getAlias($imageAlias), ['quality' =>
                    50]);

            return json_encode(['link'=>$imageLink]);

        }
    }

    public function actionDownloadGallery()
    {

        $model = new Stone();

        if ($model->load(Yii::$app->request->post())) {

            $model->file_three = UploadedFile::getInstance($model, 'file_three');
            $md5_file = md5_file($model->file_three->tempName);
            $imgDir = Yii::getAlias('@storage/images/'.$md5_file.'/');

            $imageAlias = Yii::getAlias($imgDir.'original'.'.'.$model->file_three->extension);

            $imageAlias_224X189 = Yii::getAlias($imgDir.'224X189'.'.'.$model->file_three->extension);
            $imageAlias_44X44 = Yii::getAlias($imgDir.'44X44'.'.'.$model->file_three->extension);

            $imageLink = '/storage/images/'.$md5_file.'/224X189'.'.'.$model->file_three->extension;
            if(!is_dir($imgDir)) {
                mkdir($imgDir, 0777, true);
            }



            $model->file_three->saveAs($imageAlias);

            Image::thumbnail($imageAlias, 224, 189 )
                ->save(Yii::getAlias($imageAlias_224X189), ['quality' =>
                    50]);

            Image::thumbnail($imageAlias, 44, 44 )
                ->save(Yii::getAlias($imageAlias_44X44), ['quality' =>
                    50]);

            $view = $this->renderPartial('@app/views/goods/_gallery_item', [
                'item' => ['image'=>$imageLink],
            ]);

            return json_encode(['link'=>$imageLink, 'view' =>$view]);

        }
    }

}
