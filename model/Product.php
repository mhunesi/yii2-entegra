<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 6/14/21
 * @time: 11:56 AM
 */

namespace mhunesi\entegra\model;

use yii\base\Model;
use yii\helpers\ArrayHelper;

class Product extends Model
{
    public $id;
    public $productCode;
    public $status;
    public $description;
    public $product_type;
    public $barcode;
    public $send_api;
    public $name;
    public $brand;
    public $group;
    public $quantity;
    public $currencyType;
    public $kdv_id;
    public $price1WithVAT;
    public $price2WithVAT;
    public $price3WithVAT;
    public $price4WithVAT;
    public $price5WithVAT;
    public $price6WithVAT;
    public $price7WithVAT;
    public $price8WithVAT;
    public $n11_priceWithVAT;
    public $hb_priceWithVAT;
    public $gg_buyNowPriceWithVAT;
    public $supplier;
    public $date_change;
    public $date_add;
    public $alan1;
    public $alan2;
    public $alan3;
    public $alan4;
    public $alan5;
    public $pictures;

    private $_variatios;

    public function setVariatios(array $variants)
    {
        $this->_variatios = [];

        foreach ($variants as $variant) {
            $this->_variatios[]= new Variant($variant);
        }
    }

    public function getVariatios()
    {
        return $this->_variatios;
    }

    public function addVariation(array $variant)
    {
        $this->_variatios[]= new Variant($variant);
    }

    public function fields()
    {
        return ArrayHelper::merge(parent::fields(),[
            'variatios' => function () {
                return $this->getVariatios();
            },
        ]);
    }

}