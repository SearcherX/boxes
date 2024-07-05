<?php

namespace app\controllers;

use yii\web\Controller;

class BoxController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}