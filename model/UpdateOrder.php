<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 6/14/21
 * @time: 10:30 AM
 */

namespace mhunesi\entegra\model;

use yii\base\Model;

class UpdateOrder extends Model
{
    public $id;

    public $sync;

    public $status;

    public $cargo_code2;

    public $cargo_follow_url;
}