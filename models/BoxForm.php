<?php

namespace app\models;

//use app\services\dto\BoxDto;
use yii\base\Model;

class BoxForm extends Model
{
    public $weight;
    public $width;
    public $length;
    public $height;
    public $reference;
    public $status;

    public function rules()
    {
        return [
            [['weight', 'width', 'length', 'height', 'reference'], 'required'],
            ['status', 'safe']
        ];
    }

//    public function getDto()
//    {
//        $dto = new BoxDto();
//        $dto->weight = $this->weight;
//        $dto->width = $this->width;
//        $dto->length = $this->length;
//        $dto->height = $this->height;
//        $dto->reference = $this->reference;
//        $dto->status = $this->status;
//
//        return $dto;
//    }
}