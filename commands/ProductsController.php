<?php

namespace app\commands;

use Yii;
use app\models\Products;
use yii\httpclient\Client;
use yii\console\Controller;
use DateTimeZone;
use DateTime;

class ProductsController extends Controller
{
    public function actionAddProducts()
    {
        $client = new Client();

        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('https://dummyjson.com/products')
            ->send();
        if ($response->isOk) {
            $products = $response->getData();
            foreach ($products['products'] as $product) {
                $model = new Products();
                foreach ($model->attributes as $key => $value) {
                    $timestamps = ['created_at', 'updated_at'];
                    if(array_key_exists($key,$product))
                        $model[$key] = $product[$key];
                    elseif(in_array($key,$timestamps)) {
                        $time = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                        $model->$key = $time->format('Y-m-d H:i:s');
                    }
                }
                $param = [];
                Yii::$app->db->createCommand()->upsert('products', $model->attributes, $model->attributes)->execute();

            }
        }
        else{
            echo "Failed to fetch data.";
        }
    }
}