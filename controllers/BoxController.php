<?php

namespace app\controllers;

use app\models\Box;
use app\models\BoxForm;
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

    public function actionCreate()
    {
        $formModel = new BoxForm();

        if ($formModel->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
            $box = new Box();
            $box->addByForm($formModel);
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => true];
        }

        return $this->renderAjax('box', [
            'model' => $formModel,
            'action' => 'create'
        ]);
    }

    public function actionUpdate($id)
    {
        $formModel = new BoxForm();
        $box = Box::findOne($id);

        if ($formModel->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
            $box->updateByForm($formModel);

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => true];
        }

        return $this->renderAjax('box', [
            'model' => $formModel,
            'action' => 'update',
            'box' => $box,
            'statuses' => ['Expected', 'At warehouse', 'Prepared', 'Shipped']
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