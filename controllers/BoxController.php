<?php

namespace app\controllers;

use app\models\Box;
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

    public function actionDelete($id)
    {
        if (Yii::$app->request->isAjax) {
            Box::findOne($id)->delete();
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return ['success' => true];
        }

        return $this->redirect(['index']);
    }
}