<?php

namespace frontend\controllers;

use Yii;
use common\models\Order;
use common\models\ItemOrder;
use frontend\models\Items;
use frontend\models\OrderForm;
use backend\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{

    public $layout='/column2';

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {

        if (Yii::$app->request->post()) {
            $item = $items_id = array();

            $i = 0;
            $order = Yii::$app->request->post();

            $orderData['Order'] = $order['OrderForm'];

            foreach($order['OrderForm']['one_item'] as $k => $v ){
                $item[$k]['num'] = $v['num'];
                $items_id[] = $k;
                $i++;
            }

            $items = Items::find()->where(['id'=>$items_id])->all();


            $orderModel = new Order();
            $orderModel->load($orderData);
            $orderModel->save();


            foreach($items as $one_item){
                $ItemOrderModel = new ItemOrder();
                $ItemOrderModel->order_id = $orderModel->id;
                $ItemOrderModel->num = $item[$one_item->id]['num'];
                $ItemOrderModel->item_id = $one_item->id;
                $ItemOrderModel->price = $one_item->price * $item[$one_item->id]['num'];
                $ItemOrderModel->item_name = $one_item->name;
                $ItemOrderModel->save();
            }
            Yii::$app->session->set('order', [] );
            return $this->redirect(['order/complete']);
        }
        $total_price = 0;

        $items_id = [];

        $orders = Yii::$app->session->get('order');

        if(!empty($orders)){
            foreach($orders as $k => $v) {
                $items_id[] = $k;
            }
        }


        $items = Items::find()->where(['id'=>$items_id])->all();

        foreach($items as $item) {
            $total_price += $orders[$item['id']]['num'] * $item['price'];
        }


        $dataProvider = new ArrayDataProvider([
            'allModels' => $items
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'total_price'=> $total_price,
            'model' => new OrderForm()
        ]);
    }


    public function actionComplete()
    {
        return $this->render('complete', [
        ]);
    }

    public function actionBuyItems(){
        $data = Yii::$app->request->post();
        $sessionData = Yii::$app->session->get('order');
        if(isset($sessionData) && !array_search($data['id'],Yii::$app->session->get('order')) ){
            $array = Yii::$app->session->get('order');
            $array[$data['id']] = $data;
            Yii::$app->session->set('order', $array );
        } else {
            $array[$data['id']] = $data;
            Yii::$app->session->set('order', $array );
        }
        echo count(Yii::$app->session->get('order'));

    }
    /**
     * Displays a single Order model.
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
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Order model.
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
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $data = Yii::$app->request->post();
        $sessionData = Yii::$app->session->get('order');
        unset($sessionData[$data['id']]);
        Yii::$app->session->set('order', $sessionData);
        return count(Yii::$app->session->get('order'));
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
