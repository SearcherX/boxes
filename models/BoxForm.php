<?php

namespace app\models;

use app\services\dto\BoxDto;
use yii\base\Model;

/**
 * @property float weight
 * @property float width
 * @property float length
 * @property float height
 * @property int reference
 * @property int status
 */
class BoxForm extends Model
{

    public function rules()
    {
        return [
            [['weight', 'width', 'length', 'height', 'reference'], 'required'],
        ];
    }

    public function getDto()
    {
        $dto = new BoxDto();
        $dto->weight = $this->weight;
        $dto->width = $this->width;
        $dto->length = $this->length;
        $dto->height = $this->height;
        $dto->reference = $this->reference;
        $dto->status = $this->status;

        return $dto;
    }
}