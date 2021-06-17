<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 6/4/21
 * @time: 2:31 PM
 */

namespace mhunesi\entegra\model;

use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Class Product
 * @package mhunesi\entegra\model
 * @property variants
 */
class UpdateProduct extends Model
{
    /**
     * @var integer
     */
    public $status;

    /**
     * @var string
     */
    public $group;

    /**
     * @var string
     */
    public $productCode;

    /**
     * @var string
     */
    public $productName;

    /**
     * @var integer
     */
    public $barcode;

    /**
     * @var integer
     */
    public $quantity;

    /**
     * @var double
     */
    public $price1;

    /**
     * @var double
     */
    public $price2;

    /**
     * @var double
     */
    public $price3;

    /**
     * @var double
     */
    public $price4;

    /**
     * @var double
     */
    public $price5;

    /**
     * @var double
     */
    public $price6;

    /**
     * @var double
     */
    public $price7;

    /**
     * @var double
     */
    public $price8;

    /**
     * @var string
     */
    public $description;

    /**
     * @var double
     * N11 Fiyat.
     */
    public $n11_price;

    /**
     * @var double
     * N11 indirimli fiyat.
     */
    public $n11_discountValue;

    /**
     * @var double
     * N11 Pro fiyat.
     */
    public $n11pro_price;

    /**
     * @var double
     * N11 Pro indirimli fiyat.
     */
    public $n11pro_discountValue;

    /**
     * @var double
     * Amazon Fiyat.
     */
    public $amazon_price;

    /**
     * @var double
     * Amazon indirimli fiyat.
     */
    public $amazon_salePrice;

    /**
     * @var double
     * Trendyol fiyat.
     */
    public $trendyol_listPrice;

    /**
     * @var double
     * Trendyol indirimli fiyat.
     */
    public $trendyol_salePrice;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            [['productCode'],'required'],
        ];
    }
}