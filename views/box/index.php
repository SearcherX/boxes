<?php

use app\models\Status;
use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
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
        <?= Html::a('Добавить',
            ['/box/create'],
            [
                'title' => 'Добавить',
                'class' => 'btn btn-success btn-create',
                'url' => Url::to(['/box/create'])
            ]
        );
        ?>

        <?php Pjax::begin(['id' => 'my_pjax', 'timeout' => 1000]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'id' => 'boxes-grid',
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
                    'value' => function ($model) {
                        return Status::getStatusByValue($model->status)?->getName();
                    },
                    'sortLinkOptions' => ['class' => 'app-link link-offset-2 link-underline-opacity-25 
                            link-underline-opacity-100-hover']
                ],
                [
                    'class' => ActionColumn::class,
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'update' => function ($url) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                false,
                                [
                                    'class' => 'btn-update',
                                    'title' => 'Редактировать',
                                    'url' => $url
                                ]);
                        },
                        'delete' => function ($url) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                false, [
                                    'class' => 'btn-delete',
                                    'title' => 'Удалить',
                                    'delete-url' => $url
                                ]);
                        },
                    ],

                ]
            ]
        ]) ?>
        <?php Pjax::end(); ?>
    </div>

    <div id="modal-container"></div>
</main>
</body>
</html>

<?php

$js = <<<JS
    $(document).ready(delete_record);
    $(document).ajaxSuccess(delete_record);

    function delete_record() {
        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            var deleteUrl = $(this).attr('delete-url');
            var result = confirm('Вы уверены, что хотите удалить?');                                
            if(result) {
                $.ajax({
                    url: deleteUrl,
                    type: 'post',
                    error: function(xhr, status, error) {
                        alert('Ошибка запроса.' + xhr.responseText);
                    }
                }).done(function(data) {
                    $.pjax.reload({container:"#my_pjax", timeout: false});
                });
            }
        });

    }
    
    $(document).ready(load_box_form);
    function load_box_form() {
        $('.btn-create, .btn-update').on('click', function () {
            $.get($(this).attr('url'), function(data) {
                $('#modal-container').html(data);
                $('#box-modal').modal('show');
           });
           return false;
        });
    }
    
    let modalContainer = $('#modal-container');
       
    modalContainer.on('beforeSubmit', 'form', function () {
        let form = $(this);
        let data = form.serialize();
        
        $.ajax({
            url: form.attr('action'),
               data: data,
               type: 'POST'
        }).done(function(data) {
            $('#box-modal').modal('hide');
            $.pjax.reload({container:"#my_pjax"});
        });
         
        return false;
    });
JS;

$this->registerJs($js);
?>
