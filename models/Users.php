<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property int $age
 * @property string $email
 * @property string $password
 * @property string $username
 * @property string $phone
 * @property string $birthDate
 *
 * @property Posts[] $posts
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'age', 'email', 'password', 'username', 'phone', 'birthDate'], 'required'],
            [['age'], 'integer'],
            [['birthDate'], 'safe'],
            [['firstName', 'lastName', 'email', 'password', 'username'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'age' => 'Age',
            'email' => 'Email',
            'password' => 'Password',
            'username' => 'Username',
            'phone' => 'Phone',
            'birthDate' => 'Birth Date',
        ];
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery|PostsQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::class, ['userID' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
