<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int id
 * @property float weight
 * @property float width
 * @property float length
 * @property float height
 * @property int reference
 * @property Status status
 */
class Box extends ActiveRecord
{
    public function addByForm(BoxForm $form)
    {
        $this->weight = $form->weight;
        $this->width = $form->width;
        $this->length = $form->length;
        $this->height = $form->height;
        $this->reference = $form->reference;
        $this->save();
    }

    public function updateByForm(BoxForm $form)
    {
        $this->weight = $form->weight;
        $this->width = $form->width;
        $this->length = $form->length;
        $this->height = $form->height;
        $this->reference = $form->reference;
        $this->status = $form->status;
        $this->update();
    }
}