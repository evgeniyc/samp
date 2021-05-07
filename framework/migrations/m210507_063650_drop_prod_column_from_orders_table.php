<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%orders}}`.
 */
class m210507_063650_drop_prod_column_from_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%orders}}', 'prod');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%orders}}', 'prod', $this->smallint());
    }
}
