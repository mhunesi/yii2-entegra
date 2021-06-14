<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 6/14/21
 * @time: 10:35 AM
 */

namespace mhunesi\entegra\model;


use yii\base\Model;

class CreateOrderDetails extends Model
{
    public $quantity;

    public $product_code;

    public $price;

    public $first_price;
}