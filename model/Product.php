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
class Product extends Model
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
     * @var integer
     */
    public $kdv_id;

    /**
     * @var string
     */
    public $currencyType;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $brand;

    /**
     * @var array
     */
    public $product_pictures;

    /**
     * @var Variant[]
     */
    private $_variations = [];

    /**
     * @var string
     */
    public $supplier;

    /**
     * @var string
     */
    public $supplier_id;

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
            [['status','quantity','group','productCode','barcode','price1','kdv_id','currencyType','description','product_pictures','brand','variations','supplier','supplier_id'],'required'],
            [['currencyType'],'in','range' => ['TRL','USD','EUR','CHF','SFR','IRR','RUB','GBP','JPY']],
            [['kdv_id'],'in', 'range' => [0,8,10,18]],
        ];
    }


    public function setVariations(array $variants)
    {
        $this->_variations = [];

        foreach ($variants as $variant) {
            $this->_variations[]= new Variant($variant);
        }
    }

    public function getVariations()
    {
        return $this->_variations;
    }

    public function addVariation(array $variant)
    {
        $this->_variations[]= new Variant($variant);
    }

    public function fields()
    {
        return ArrayHelper::merge(parent::fields(),[
            'variations' => function () {
                return $this->getVariations();
            },
        ]);
    }
}