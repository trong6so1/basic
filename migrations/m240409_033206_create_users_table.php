<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m240409_033206_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(50)->notNull(),
            'lastName' => $this->string(50)->notNull(),
            'age' => $this->integer()->notNull(),
            'email' => $this->string(50)->notNull(),
            'password' => $this->string(50)->notNull(),
            'username' => $this->string(50)->notNull(),
            'phone' => $this->string(15)->notNull(),
            'birthDate' => $this->date()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
