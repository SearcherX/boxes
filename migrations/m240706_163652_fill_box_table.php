<?php

use app\helpers\DateHelper;
use yii\db\Migration;

/**
 * Class m240706_163652_fill_box_table
 */
class m240706_163652_fill_box_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = ['weight', 'width', 'length', 'height', 'reference', 'status', 'created_at'];
        $rows = [
            [50, 600, 400, 400, 1, 1, DateHelper::getTimeStamp('2024-01-21 12:30:41')],
            [20, 265, 165, 100, 2, 1, DateHelper::getTimeStamp('2024-03-22 11:30:41')],
            [10, 160, 110, 60, 1, 1, DateHelper::getTimeStamp('2024-05-21 10:30:41')],
            [19, 200, 150, 90, 1, 1, DateHelper::getTimeStamp('2024-05-21 12:30:41')],
            [40, 400, 300, 300, 1, 1, DateHelper::getTimeStamp('2024-03-05 11:23:30')]
        ];
        $this->batchInsert('{{%box}}', $columns, $rows);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240706_163652_fill_box_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240706_163652_fill_box_table cannot be reverted.\n";

        return false;
    }
    */
}
