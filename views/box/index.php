<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

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

        <?php Pjax::begin(['id' => 'my_pjax']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $model,
            'tableOptions' => ['class' => 'table table-bordered table-hover'],
            'layout' => "{summary}\n{items}\n{pager}",
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
                    'buttons' => [
                        'delete' => function ($url) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                false, [
                                    'class' => 'pjax-delete-link',
                                    'title' => 'Удалить',
                                    'delete-url' => $url,
                                    'pjax-container' => 'my_pjax',
                                ]);
                        },
                    ],

                ]
            ]
        ]) ?>
        <?php Pjax::end(); ?>
    </div>
</main>
</body>
</html>

<?php
$js = <<<JS
    $(document).ready(delete_record);
    $(document).ajaxSuccess(delete_record);

    function delete_record() {
        $('.pjax-delete-link').on('click', function(e) {
            e.preventDefault();
            var deleteUrl = $(this).attr('delete-url');
            var pjaxContainer = $(this).attr('pjax-container');
            var result = confirm('Вы уверены, что хотите удалить?');                                
            if(result) {
                $.ajax({
                    url: deleteUrl,
                    type: 'post',
                    error: function(xhr, status, error) {
                        alert('Ошибка запроса.' + xhr.responseText);
                    }
                }).done(function(data) {
                    $.pjax.reload('#' + $.trim(pjaxContainer), {timeout: 3000});
                });
            }
        });

    }
JS;

$this->registerJs($js);
?>
