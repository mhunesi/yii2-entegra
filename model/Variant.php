<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 6/4/21
 * @time: 2:47 PM
 */

namespace mhunesi\entegra\model;


use yii\base\Model;
use yii\helpers\ArrayHelper;

class Variant extends Model
{
    public $id;
    /**
     * @var integer
     */
    public $barcode;

    /**
     * @var string
     */
    public $productCode;

    /**
     * @var string
     */
    public $mainProductCode;

    /**
     * @var integer
     */
    public $quantity;

    /**
     * @var integer
     */
    public $subtract;

    /**
     * @var float
     */
    public $price = 0;

    /**
     * @var string
     */
    public $price_prefix = '+';

    /**
     * @var int
     */
    public $points = 0;

    /**
     * @var string
     */
    public $points_prefix = '+';

    /**
     * @var int
     */
    public $weight = 0;

    /**
     * @var int
     */
    public $weight_prefix = 0;

    public $n11_price;

    public $hb_st_sku;

    public $gg_price;

    public $hb_price; //String
    public $trendy_price; //String
    public $modanisa_price; //String
    public $eticaret_price; //String
    public $n11pro_price; //String
    public $sp_price; //String
    public $eptt_price; //String
    public $amazon_price; //String
    public $hb_sku; //String
    public $morhipo_price; //String
    public $itemdim1code; //String
    public $itemdim2code; //String
    public $variationSpec; //String

    /**
     * @var VariationSpecs[]
     */
    private $_variation_specs = [];

    /**
     * @param array $variation_specs
     */
    public function setVariation_Specs(array $variation_specs)
    {
        $this->_variation_specs = [];

        foreach ($variation_specs as $spec) {
            $this->_variation_specs[] = new VariationSpecs($spec);
        }
    }

    /**
     * @return VariationSpecs[]
     */
    public function getVariation_Specs()
    {
        return $this->_variation_specs;
    }

    /**
     * @var array
     */
    public $variation_pictures = [];


    public function fields()
    {
        return ArrayHelper::merge(parent::fields(),[
            'variation_specs' => function () {
                return $this->getVariation_Specs();
            },
        ]);
    }

}