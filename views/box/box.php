<?php
?>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $action === 'create' ? 'Добавить коробку' : 'Обновить коробку';
?>

<div class="modal" id="box-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="box-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
            $form = ActiveForm::begin([
                'enableClientValidation' => true,
                'options' => [
                    'id' => 'box-form'
                ]
            ]);
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="box-modal-label"><?= $this->title ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= $form->field($model, 'weight')
                    ->textInput(['value' => $action === 'update' ? $box->weight : ''])->label('Вес') ?>
                <?= $form->field($model, 'width')
                    ->textInput(['value' => $action === 'update' ? $box->width : ''])->label('Ширина') ?>
                <?= $form->field($model, 'length')
                    ->textInput(['value' => $action === 'update' ? $box->length : ''])->label('Длина') ?>
                <?= $form->field($model, 'height')
                    ->textInput(['value' => $action === 'update' ? $box->height : ''])->label('Высота') ?>
                <?= $form->field($model, 'reference')
                    ->textInput(['value' => $action === 'update' ? $box->reference : ''])->label('Номер референса') ?>
                <?php if ($action === 'update') {
                    echo $form->field($model, 'status')->dropDownList(
                        $statuses,
                        [
                            'prompt' => [
                                'text' => 'Выберите параметр',
                                'options' => ['disabled' => true, 'selected' => true]
                            ],
                            'class' => 'form-select',
                            'value' => $box->status
                        ]
                    )->label('Статус', ['class' => 'form-label']);
                } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
