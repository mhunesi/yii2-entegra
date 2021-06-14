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

class CreateOrder extends Model
{
    public $supplier;

    public $order_id;

    public $company;

    public $full_name;

    public $email;

    public $mobile_phone;

    public $phone;

    public $invoice_address;

    public $invoice_city;

    public $invoice_district;

    public $invoice_fullname;

    public $invoice_postcode;

    public $invoice_tel;

    public $invoice_gsm;

    public $ship_address;

    public $ship_city;

    public $ship_district;

    public $ship_fullname;

    public $ship_postcode;

    public $ship_tel;

    public $ship_gsm;

    public $tax_office;

    public $order_date;

    public $cargo_code;

    public $payment_type;

    public $cargo;

    public $cargo_payment_method;

    public $bank;

    public $installment;

    /**
     * @var OrderDetails[]
     */
    private $_order_details = [];

    /**
     * @return OrderDetails[]
     */
    public function getOrder_Details()
    {
        return $this->_order_details;
    }

    /**
     * @param array $orderDetails
     */
    public function setOrder_Details(array $orderDetails)
    {
        $this->_order_details = [];

        foreach ($orderDetails as $orderDetail) {
            $this->_order_details[] = new OrderDetails($orderDetails);
        }
    }
}