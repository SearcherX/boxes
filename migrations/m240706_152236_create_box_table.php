<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%box}}`.
 */
class m240706_152236_create_box_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%box}}', [
            'id' => $this->primaryKey(),
            'weight' => $this->float(2)->notNull(),
            'width' => $this->float(2)->notNull(),
            'length' => $this->float(2)->notNull(),
            'height' => $this->float(2)->notNull(),
            'reference' => $this->integer()->notNull(),
            'status' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%box}}');
    }
}
