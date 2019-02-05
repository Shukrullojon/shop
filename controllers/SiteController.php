<?php

namespace app\controllers;

use app\models\Category;
use app\models\Go;
use app\models\Help;
use app\models\Product;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ProductPagination;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
        $product=Product::find()->asArray()->limit(4)->all();
        $bestpro=Product::find()->asArray()->orderBy(['count_view'=>SORT_DESC])->limit(20)->all();
        $carousel=ProductPagination::find()->asArray()->limit(6)->all();

        $pp=Product::find()->asArray()->all();
        foreach($pp as $val){
            $item[]=$val['id'];
        }
        $select=[];
        for($i=0; $i < 4; $i++){
            $p=rand(0,count($item));
            $select[] = $p;
        }
        $sum="";

        foreach($select as  $item=>$value){
            if(count($select)==$item++){
                $sum .= "$value";
            }else{
                $sum .= "$value".",";
            }
        }
        //$sql="select * from product where id in($sum)";
        //$pro=Product::find()->where(['id'=>$sum])->all();
        //$pro=Product::findBySql($sql)->all();
        $pro=Product::find()->limit(24)->asArray()->all();
        return $this->render('index',['product'=>$product,'bestpro'=>$bestpro,'carousel'=>$carousel,'pro'=>$pro]);
    }
    // Kategoriy page
    public function actionCategory($id){
        $cat=Product::find()->asArray()->where(['category_id'=>$id])->all();
        $category=Category::findOne($id);
        $bestpro=Product::find()->asArray()->orderBy(['count_view'=>SORT_DESC])->limit(20)->all();
        return $this->render('category',['category'=>$cat,'bestpro'=>$bestpro,'categorys'=>$category]);
    }
    // Mahsulot
    public function actionProduct($id){
        $product=Product::find()->where(['id'=>$id])->asArray()->all();
        return $this->render('product',['product'=>$product]);
    }
    // Yetqazib berish
    public function actionGo(){
        $go=Go::find()->asArray()->all();
        return $this->render('go',['go'=>$go]);
    }
    // yordam
    public function actionHelp(){
        $help=Help::find()->asArray()->all();
        return $this->render('help',['help'=>$help]);
    }
    // search
    public function actionSearch(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $search = $_GET['search'];
        $output='';
        if(!$search=='') {
            $sql = "select * from product where name LIKE '%".$search."%'";
            $ser = Product::findBySql($sql)->asArray()->all();
            foreach($ser as $item=>$value){
            $output .= "
                <div class='panel panel-info' style='margin-bottom: 0px; height: 100px'>
                    <div class='panel-heading'></div>
                    <div class='panel-body'>
                        <div class='row'>
                            <div class='col-md-3 col-xs-12'>
                                <a href='".Url::to(['site/product','id'=>$value['id']])."'>
                                    <img src='/images/product/".$value['image']."' style='height: 60px'>
                                </a>
                            </div>
                            <div class='col-md-6 col-xs-12'>
                                <a href='".Url::to(['site/product','id'=>$value['id']])."'>
                                    <p>".$value['name']."</p>
                                    <p>".$value['price']." so'm</p>
                                </a>
                            </div>
                            <div class='col-md-3 col-xs-12'>
                                  <a class='btn btn-primary more' href='single.html'>
                                        <div>Tanlash</div>
                                        <div><i class='ion-ios-arrow-thin-right'></i></div>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }else{
            $output .= "";
        }
        return[
            'status' => 'success',
            'data' => $output
        ];
    }

    // Login
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
