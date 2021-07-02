<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 6/14/21
 * @time: 10:48 AM
 */

namespace mhunesi\entegra\model;

use yii\base\Model;
use yii\helpers\ArrayHelper;

class Order extends Model
{
    public $id;
    public $no;
    public $datetime;
    public $entegration;
    public $status;
    public $customer_id;
    public $company;
    public $firstname;
    public $lastname;
    public $email;
    public $mobil_phone;
    public $telephone;
    public $fax;
    public $invoice_address;
    public $invoice_city;
    public $ship_address;
    public $ship_city;
    public $sync;
    public $tax_office;
    public $tax_number;
    public $invoice_district;
    public $invoice_fullname;
    public $invoice_postcode;
    public $invoice_tel;
    public $invoice_gsm;
    public $ship_district;
    public $ship_fullname;
    public $ship_postcode;
    public $ship_tel;
    public $ship_gsm;
    public $total;
    public $discount;
    public $tc_id;
    public $order_number;
    public $supplier;
    public $supplier_id;
    public $invoice_date;
    public $ship_date;
    public $invoice_print;
    public $ship_print;
    public $cargo_code;
    public $cargo_fee_type;
    public $cargo_company;
    public $grand_total;
    public $tax;
    public $customer_code;
    public $store_order_status;
    public $store_order_status_name;
    public $invoice_number;
    public $ship_number;
    public $username;
    public $eur_rate;
    public $usd_rate;
    public $paymentType;
    public $order_prefix;
    public $delivery_method;
    public $guid;
    public $ship_price;
    public $currencyType;
    public $currency_rate;
    public $erp_order_number;
    public $erp_error;
    public $erp_message;
    public $bank_code;
    public $installment;
    public $marketing_sync;
    public $invoice_country;
    public $ship_country;
    public $invoice_country_code;
    public $ship_country_code;
    public $supplier_order_id;
    public $cargo_code2;
    public $cargo_sync;
    public $total_commission_include_tax;
    public $supplier_packet_id;
    public $total_paid_price;
    public $payment_status;
    public $cargo_follow_url;
    public $cargo_finally_statu;
    public $cargo_send_date;
    public $coupon_price;
    public $note;
    public $cargo_barcode_raw;
    public $cargo_packet_quantity;
    public $cargo_error_message;
    public $gib_number;
    public $tracking_number_sync;
    public $cargo_cancel_sync;
    public $cargo_service_information;
    public $morhipo_order_statu;
    public $fulfillment;
    public $fulfillment_sync;
    public $fulfillment_code;
    public $fulfillment_error_message;
    public $ettn;
    public $send_efatura;
    public $cargo_delivery_status_sync;
    public $create_common_label_sync;
    public $order_process;
    public $date_add;
    public $date_change;
    public $is_fulfillment;
    public $platform_reference_no;
    public $is_partial;
    public $grand_total_desi;
    public $cargo_packet_type;
    public $einvoice_error_message;
    public $hb_discount_invoice;
    public $mut_odeme;
    public $mut_kargo;
    public $mut_iptal;
    public $total_product;
    public $total_product_quantity;
    public $mut_hizmet;


    /**
     * @var array OrderPr
     */
    private $_order_product = [];

    /**
     * @param $order_products
     */
    public function setOrder_Product($order_products)
    {
        $this->_order_product = [];

        foreach ($order_products as $order_product) {
            $this->_order_product[] = new OrderProduct($order_product);
        }
    }

    /**
     * @return array
     */
    public function getOrder_Product()
    {
        return $this->_order_product;
    }

    public function fields()
    {
        return ArrayHelper::merge(parent::fields(),[
            'order_product' => function () {
                return $this->getOrder_Product();
            },
        ]);
    }

}