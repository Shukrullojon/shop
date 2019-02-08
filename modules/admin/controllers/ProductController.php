<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Image;

class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Product();
        if($model->load(Yii::$app->request->post())) {
            $model->count_view=0;
            $model->like=0;
            $image = Image::findOne(1);
            $imageName=$image->sum;
            $image->updateCounters(['sum' => 1]);
            $model->imageFile=UploadedFile::getInstance($model,'imageFile');
            if($model->imageFile->extension=='jpg' || $model->imageFile->extension=='png' || $model->imageFile->extension=='jpeg'){
                $model->imageFile->saveAs('images/product/'.$imageName.'.'.$model->imageFile->extension);
                $model->image=$imageName.'.'.$model->imageFile->extension;
                if($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                echo "Rasmni formatini xato kiritdingiz";
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

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


    public function actionDelete($id)
    {
        $product=Product::findOne($id);
        $img=$product->image;
        $url="../../../web/images/product/$img";
        unset($url);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
