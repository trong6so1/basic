<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use app\models\query\ProductsQuery;
use yii\db\ActiveRecord;
use DateTime;
use DateTimeZone;
/**
 * This is the model class for table "{{%products}}".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property float $price
 * @property float $discountPercentage
 * @property float $rating
 * @property int $stock
 * @property string $brand
 * @property string $category
 */
class Products extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName() :string
    {
        return '{{%products}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() : array
    {
        return [
            [['title', 'price', 'discountPercentage', 'rating', 'brand', 'category'], 'required'],
            [['description'], 'string'],
            [['price', 'discountPercentage', 'rating'], 'number'],
            [['stock'], 'integer'],
            [['title', 'brand', 'category'], 'string', 'max' => 255],
        ];
    }

    public function behaviors() :array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () {
                    $dateTime = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                    return $dateTime->format('Y-m-d H:i:s');
                },
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() :array
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'discountPercentage' => 'Discount Percentage',
            'rating' => 'Rating',
            'stock' => 'Stock',
            'brand' => 'Brand',
            'category' => 'Category',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsQuery(get_called_class());
    }
}
