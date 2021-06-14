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

namespace mhunesi\entegra\services;


use yii\helpers\Json;
use GuzzleHttp\Client;
use yii\base\BaseObject;
use mhunesi\entegra\model\Order;
use mhunesi\entegra\model\CreateOrder;
use mhunesi\entegra\helpers\ArrayHelper;

class OrderService extends BaseObject
{
    /** @var Client */
    public $client;

    public function create(CreateOrder $createOrder)
    {
        $endPoint = "/order/";

        $response = $this->client->request('POST',$endPoint,[
            'body' => Json::encode(['list' => [ArrayHelper::ArrayFilterRecursive($createOrder->toArray())]])
        ]);

        return Json::decode($response->getBody());
    }


    public function all($page=1,$start_date = null,$end_date = null)
    {
        $orders = [];

        $endPoint = "/order/page={$page}/";

        $response = $this->client->request('GET',$endPoint,[
            'query' => ['start_date' => $start_date,'end_date' => $end_date]
        ]);

        $orderResponse = ArrayHelper::getValue(Json::decode($response->getBody()),'orders');

        foreach ($orderResponse as $order) {
            $orders[] = new Order($order);
        }

        return $orders;
    }


}