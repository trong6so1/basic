<?php

namespace app\controllers;

use app\models\Products;
use yii\rest\ActiveController;

class ProductsController extends ActiveController
{
    public $modelClass = Products::class;
}