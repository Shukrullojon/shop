<?php

namespace app\modules\admin;
use Yii;
/**
 * admin module definition class
 */
class Modue extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';
    public function init()
    {
        parent::init();
        Yii::$app->viewPath='@app/modules/admin/views';
    }
}
