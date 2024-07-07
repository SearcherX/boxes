<?php

namespace app\controllers;

use app\models\BoxSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class BoxController extends Controller
{
    public function actionIndex()
    {
        $model = new BoxSearch();
        $dataProvider = $model->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }
}