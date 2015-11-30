<?php
namespace frontend\controllers;

use backend\models\Colors;
use frontend\models\Page;
use backend\models\TypeOfStone;
use common\models\DetailsRequest;
use common\models\Events;
use common\models\Goods;
use common\models\SiteSearchForm;
use common\models\Stone;
use common\models\Subscribe;
use yii\data\ArrayDataProvider;
use Yii;
use common\models\StoneSearch;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\WorkType;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\db\Query;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use frontend\models\Cars;
use common\models\QuickOrder;
use common\models\Callback;
use common\components\MailWidget;
use yii\widgets\MyListView;
use common\models\Category;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();
            if(isset($post['QuickOrder'])){

                $text = "Имя: ".$post['QuickOrder']['phone_num'].'<br>';
                $text .= "E-mail: ".$post['QuickOrder']['email'].'<br>';
                $text .= "Коментарий: ".$post['QuickOrder']['comment'];
                $model = new QuickOrder();
                $model->load(Yii::$app->request->post());
                $model->save();
                MailWidget::widget(['email' => 'butikmramora@gmail.com', 'text' => $text, 'subject' => 'Консультация']);
                return $this->redirect('success');
            } else if(isset($post['Subscribe'])){
                $text = "E-mail: ".$post['Subscribe']['email'].'<br>';
                $text .= "Телефон: ".$post['Subscribe']['phone_num'];
                $model = new Subscribe();
                $model->load(Yii::$app->request->post());
                $model->save();
                MailWidget::widget(['email' => 'butikmramora@gmail.com', 'text' => $text, 'subject' => 'Обратный звонок']);
                return $this->redirect('success');
            } else if(isset($post['DetailsRequest'])){
                $text  = "Имя: ".$post['DetailsRequest']['name'].'<br>';
                $text .= "E-mail: ".$post['DetailsRequest']['email'].'<br>';
                $text .= "Город: ".$post['DetailsRequest']['city'].'<br>';
                $text .= "Телефон: ".$post['DetailsRequest']['phone_number'];
                $text .= "Коментарий: ".$post['DetailsRequest']['comment'];
                $model = new DetailsRequest();
                $model->load(Yii::$app->request->post());
                $model->save();
                MailWidget::widget(['email' => 'butikmramora@gmail.com', 'text' => $text, 'subject' => 'Дополнительная информация']);
                return $this->redirect('success');
            }

        }

        $dataGoodsProvider = new ArrayDataProvider([
            'allModels' => Category::find()->all()
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => Stone::find()->where(['filter_one' => 1]),
            'pagination' => [
                'pageSize' => 0
            ],
        ]);
        $dataEventProvider = new ArrayDataProvider([
            'allModels' => Events::find()->all()
        ]);

        $stonesData = TypeOfStone::find()->all();
        $colorsData = Colors::find()->all();

        return $this->render('index', [
            'dataProvider'     => $dataProvider,
            'dataGoodsProvider'=>$dataGoodsProvider,
            'dataEventProvider'=>$dataEventProvider,
            'stonesData'       =>$stonesData,
            'colorsData'       =>$colorsData,

        ]);
    }


    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        return $this->render('contact', []);
    }

    public function actionAbout()
    {
        $dataEventProvider = new ArrayDataProvider([
            'allModels' => Events::find()->all()
        ]);
        return $this->render('about',[
            'dataEventProvider'=>$dataEventProvider
        ]);
    }

    public function actionSuccess()
    {
        return $this->render('success');
    }

    public function actionSearch()
    {
        $this->layout = '/column';
        $search = new SiteSearchForm();
        if ($search->load(Yii::$app->request->get()) && $search->validate()) {
            $query1 = (new Query())
                ->select('name, image, description, translit ')
                ->addSelect(["CONCAT('stone/view') AS url"])
                ->where(['like','name',$search->string])
                ->from('{{%stone}}');

            $query2 = (new Query())
                ->select('name, image, description, translit ')
                ->addSelect(["CONCAT('goods/one-item') AS url"])
                ->where(['like','name',$search->string])
                ->from('{{%goods}}');

            $dataProvider = new ArrayDataProvider([
                'allModels' => $query1->union($query2)->all(),
                'pagination' => [
                    'pageSize' => 6,
                ],

            ]);

            return $this->render('search', [

                'dataProvider' => $dataProvider,
            ]);


        }
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionChoseCar(){
        try{
            $post = Yii::$app->request->post();
            Yii::$app->session->set('chosen-car', $post['car_id']);
        } catch (\Exception $e) {
            echo $e->getMessage();
            echo $e->getLine();
        }

    }

    public function actionTest(){
        die();
    }

    public function actionContacts(){
        $this->layout='/column2';
        return $this->render('contacts');
    }

    public function actionAjaxFilter(){
        Yii::$app->request->queryParams;
        $searchModel = new StoneSearch();
        $array = Yii::$app->request->post();
        $post = json_decode($array['post']);

        $dataProvider = $searchModel->search(['StoneSearch'=>(array)$post]);
        echo MyListView::widget( [
            'dataProvider' => $dataProvider,
            'itemView'=>'@app/views/site/_stone_list',
            'summary'=>'',
            'options'=>
                [
                    'tag'=>'ul'
                ]
        ] );

    }
    public function actionPriceList(){
        return $this->render('price-list', [

        ]);
    }

}
