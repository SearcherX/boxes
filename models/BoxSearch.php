<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class BoxSearch extends Box
{
    public function search($params)
    {
        $query = Box::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}