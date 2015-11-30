<?php

namespace backend\controllers;

use common\models\SeoData;
use Yii;
use common\models\Goods;
use common\models\GoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends Controller
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
                        'actions' => ['logout', 'index','create','update','view','delete','download-img', 'download-gallery' ],
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
     * Lists all Goods models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Goods model.
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
     * Creates a new Goods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Goods();
        $seoModel = new SeoData();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if($seoModel->load(Yii::$app->request->post())){

                $seoModel->item_id = $model->id;
                $seoModel->model = 'Goods';
                $seoModel->save();

                $model->seo_id = $seoModel->id;
                $model->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Goods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $seoModel= $this->findSeoModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if($seoModel->load(Yii::$app->request->post())){

                $seoModel->item_id = $model->id;
                $seoModel->model = 'Goods';
                $seoModel->save();

                $model->seo_id = $seoModel->id;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Goods model.
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
     * Finds the Goods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findSeoModel($id)
    {
        if (($model = SeoData::findOne(['item_id'=> $id, 'model'=> 'Goods'])) !== null) {
            return $model;
        } else {
            return new SeoData();
        }
    }


    public function actionDownloadImg()
    {
        $model = new Goods();

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');
            $md5_file = md5_file($model->file->tempName);
            $imgDir = Yii::getAlias('@storage/cars/'.$md5_file.'/');
            $imageAlias = Yii::getAlias($imgDir.'160x146'.'.'.$model->file->extension);
            $imageLink = '/storage/cars/'.$md5_file.'/160x146'.'.'.$model->file->extension;
            if(!is_dir($imgDir)) {
                mkdir($imgDir, 0777, true);
            }
            $model->file->saveAs($imageAlias);
            Image::thumbnail($imageAlias, 160, 146, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET)
                ->save(Yii::getAlias($imageAlias), ['quality' =>
                    100]);

            return json_encode(['link'=>$imageLink]);

        }
    }

    public function actionDownloadGallery()
    {

        $model = new Goods();

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
                    100]);

            Image::thumbnail($imageAlias, 44, 44 )
                ->save(Yii::getAlias($imageAlias_44X44), ['quality' =>
                    100]);

            $view = $this->renderPartial('@app/views/goods/_gallery_item', [
                'item' => ['image'=>$imageLink],
            ]);

            return json_encode(['link'=>$imageLink, 'view' =>$view]);

        }
    }
}
