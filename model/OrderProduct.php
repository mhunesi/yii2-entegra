<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 6/14/21
 * @time: 10:52 AM
 */

namespace mhunesi\entegra\model;

use yii\base\Model;

class OrderProduct extends Model
{
    public $order_product_id; 
    public $order_id; 
    public $product_id; 
    public $name; 
    public $model; 
    public $quantity; 
    public $price; 
    public $total; 
    public $tax; 
    public $sellerdiscount; 
    public $malldiscount; 
    public $sellerinvoiceamount; 
    public $dueamount; 
    public $commission; 
    public $status; 
    public $tax_id; 
    public $store_stock_code; 
    public $store_stock_name; 
    public $store_order_status; 
    public $store_order_status_name; 
    public $quantity_decrease; 
    public $pricex; 
    public $currencyType; 
    public $priceIncludedTax; 
    public $product_option_value_id; 
    public $product_option_name; 
    public $product_option_value_name; 
    public $invoice_name; 
    public $store_stock_id; 
    public $ShippingType; 
    public $ShipmentProvider; 
    public $TrackingCode; 
    public $pov_productCode; 
    public $store_stock_varcode; 
    public $barcode; 
    public $product_type; 
    public $product_supplier; 
    public $packet_id; 
    public $packet_code; 
    public $packet_price; 
    public $packet_tax_id; 
    public $packet_quantity; 
    public $note; 
    public $supplier; 
    public $supplier_id; 
    public $commission_rate; 
    public $discount_rate; 
    public $first_price; 
    public $is_fulfillment; 
    public $variation_values;
    public $platform_reference_no;
    public $total_desi;
    public $total_cargo_packet_amount;
    public $buying_price;
    public $scanned;
    public $total_product;

}