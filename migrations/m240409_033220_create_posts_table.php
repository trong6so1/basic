<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts}}`.
 */
class m240409_033220_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%posts}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'body' => 'LONGTEXT',
            'userID' => $this->integer()->notNull(),
            'tags' => $this->string()->notNull(),
            'reactions' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-posts-userID',
            '{{%posts}}',
            'userID',
            '{{%users}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-posts-userID', '{{%posts}}');
        $this->dropTable('{{%posts}}');
    }
}
