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

/**
 * Class UpdateOrder
 * @package mhunesi\entegra\model
 */
class UpdateOrder extends Model
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $sync;

    /**
     * @var int
     */
    public $status;

    /**
     * @var string
     */
    public $cargo_code2;

    /**
     * @var string
     */
    public $cargo_follow_url;
}