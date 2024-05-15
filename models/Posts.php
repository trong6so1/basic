<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%posts}}".
 *
 * @property int $id
 * @property string $title
 * @property string|null $body
 * @property int $userID
 * @property string $tags
 * @property int $reactions
 *
 * @property Users $user
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%posts}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'userID', 'tags', 'reactions'], 'required'],
            [['body'], 'string'],
            [['userID', 'reactions'], 'integer'],
            [['title', 'tags'], 'string', 'max' => 255],
            [['userID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['userID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'userID' => 'User ID',
            'tags' => 'Tags',
            'reactions' => 'Reactions',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'userID']);
    }

    /**
     * {@inheritdoc}
     * @return PostsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostsQuery(get_called_class());
    }
}
