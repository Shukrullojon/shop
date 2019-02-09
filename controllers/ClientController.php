<?php

namespace app\controllers;

use app\models\Order;
use app\models\OrderItem;
use Yii;
use app\models\Client;
use app\models\ClientSearch;
use app\models\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ClientController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Client model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        session_start();
        $model = new Client();
        $order_item=new OrderItem();
        if($model->load(Yii::$app->request->post())) {
            $model->status=0;
            $model->save();
            $client_id=Client::find()->orderBy(['id'=>SORT_DESC])->one();
            $order = new Order();
            // order client id sini to'ldirish
            $order->client_id=$client_id->id;
            $check = Image::findOne(1);
            $check_code=$check->sum;
            $check->updateCounters(['sum' => 1]);
            // order ni check kodini to'ldirish
            $order->check_code=$check_code;
            if($order->save()){
                $order=Order::find()->orderBy(['id'=>SORT_DESC])->one();
                $order_items = new OrderItem();
                foreach($_SESSION['shopping_cart'] as $item=>$value){
                    $order_items->order_id=$order->id;
                    $order_items->product_id=$value['product_id'];
                    $order_items->count=$value['product_quantity'];
                    $order_items->price=$value['product_price'];
                    if($order_items->save())
                        continue;
                }
                session_destroy();
                return $this->render('success');
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Client model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Client model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Client::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
