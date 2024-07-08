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
 * @property int status
 */
class Box extends ActiveRecord
{
}