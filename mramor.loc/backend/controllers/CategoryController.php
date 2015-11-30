<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Category;
use common\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
                        'actions' => ['logout', 'index','create','update','view','delete','download-img','download-cover', 'download-gallery' ],
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {
            $model->parent_category = $model->parent_category ? $model->parent_category : '0';
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->parent_category = $model->parent_category ? $model->parent_category : '0';
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDownloadImg()
    {
        
        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');
            $md5_file = md5_file($model->file->tempName);
            $imgDir = Yii::getAlias('@storage/category/'.$md5_file.'/');
            $imageAlias = Yii::getAlias($imgDir.'220x120'.'.'.$model->file->extension);
            $imageLink = '/storage/category/'.$md5_file.'/220x120'.'.'.$model->file->extension;
            if(!is_dir($imgDir)) {
                mkdir($imgDir, 0777, true);
            }
            $model->file->saveAs($imageAlias);
            Image::thumbnail($imageAlias, 220, 120 )
                ->save(Yii::getAlias($imageAlias), ['quality' =>
                    50]);

            return json_encode(['link'=>$imageLink]);

        }
    }

    public function actionDownloadCover()
    {

        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {

            $model->file_two = UploadedFile::getInstance($model, 'file_two');
            $md5_file = md5_file($model->file_two->tempName);
            $imgDir = Yii::getAlias('@storage/category/'.$md5_file.'/');
            $imageAlias = Yii::getAlias($imgDir.'588x454'.'.'.$model->file_two->extension);
            $imageLink = '/storage/category/'.$md5_file.'/588x454'.'.'.$model->file_two->extension;
            if(!is_dir($imgDir)) {
                mkdir($imgDir, 0777, true);
            }
            $model->file_two->saveAs($imageAlias);
            Image::thumbnail($imageAlias, 588, 454 )
                ->save(Yii::getAlias($imageAlias), ['quality' =>
                    50]);

            return json_encode(['link'=>$imageLink]);

        }
    }


    public function actionDownloadGallery()
    {

        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {

            $model->file_three = UploadedFile::getInstance($model, 'file_three');
            $md5_file = md5_file($model->file_three->tempName);
            $imgDir = Yii::getAlias('@storage/images/'.$md5_file.'/');

            $imageAlias = Yii::getAlias($imgDir.'original'.'.'.$model->file_three->extension);

            $imageAlias_224X189 = Yii::getAlias($imgDir.'205X145'.'.'.$model->file_three->extension);
            $imageAlias_44X44 = Yii::getAlias($imgDir.'44X44'.'.'.$model->file_three->extension);

            $imageLink = '/storage/images/'.$md5_file.'/205X145'.'.'.$model->file_three->extension;
            if(!is_dir($imgDir)) {
                mkdir($imgDir, 0777, true);
            }



            $model->file_three->saveAs($imageAlias);

            Image::thumbnail($imageAlias, 205, 145 )
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
