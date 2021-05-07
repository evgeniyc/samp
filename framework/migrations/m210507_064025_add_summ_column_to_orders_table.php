<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%orders}}`.
 */
class m210507_064025_add_amount_column_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%orders}}', 'amount', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%orders}}', 'amount');
    }
}
