<?php

namespace app\helpers;

use yii\db\Expression;

class DateHelper
{
    /**
     * @throws \Exception
     */
    public static function getTimeStamp(string $date): Expression
    {
        return (new Expression("TIMESTAMP(\"{$date}\")"));
    }
}