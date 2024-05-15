<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m240409_033229_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => 'LONGTEXT',
            'price' => $this->double()->notNull(),
            'discountPercentage' => $this->double()->notNull(),
            'rating' => $this->double()->notNull(),
            'stock' => $this->integer()->notNull()->defaultValue(0),
            'brand' => $this->string()->notNull(),
            'category' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
