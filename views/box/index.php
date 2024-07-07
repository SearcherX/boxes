<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Таблица коробок';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<main>
    <div class="mt-2">
        <div class="row px-5"></div>
        <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $model,
            'tableOptions' => ['class' => 'table table-bordered table-hover'],
            'layout' => "{pager}\n{summary}\n{items}",
            'pager' => [
                'class' => 'yii\bootstrap5\LinkPager'
            ],
            'columns' => [
                [
                    'class' => 'yii\grid\CheckboxColumn'
                ],
                [
                    'attribute' => 'id',
                    'label' => 'ID',
                    'sortLinkOptions' => ['class' => 'app-link link-offset-2 link-underline-opacity-25 
                            link-underline-opacity-100-hover']
                ],
                [
                    'attribute' => 'created_at',
                    'label' => 'Дата создания',
                    'sortLinkOptions' => ['class' => 'app-link link-offset-2 link-underline-opacity-25 
                            link-underline-opacity-100-hover']
                ],
                [
                    'attribute' => 'weight',
                    'label' => 'Вес',
                    'sortLinkOptions' => ['class' => 'app-link link-offset-2 link-underline-opacity-25 
                            link-underline-opacity-100-hover']
                ],
                [
                    'attribute' => 'status',
                    'label' => 'Статус',
                    'sortLinkOptions' => ['class' => 'app-link link-offset-2 link-underline-opacity-25 
                            link-underline-opacity-100-hover']
                ],
                [
                    'class' => ActionColumn::class,
                    'template' => '{view} {update} {delete}',
                ]
            ]
        ]) ?>
    </div>
</main>
</body>
</html>
