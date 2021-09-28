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


use Yii;
use yii\helpers\Json;
use GuzzleHttp\Client;
use yii\base\BaseObject;
use mhunesi\entegra\model\Order;
use mhunesi\entegra\model\CreateOrder;
use mhunesi\entegra\model\UpdateOrder;
use mhunesi\entegra\helpers\ArrayHelper;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class OrderService
 * @package mhunesi\entegra\services
 */
class OrderService extends BaseObject
{
    /** @var Client */
    public $client;

    /**
     * @param CreateOrder $createOrder
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function create(CreateOrder $createOrder)
    {
        $endPoint = "/order/";

        return $this->client->request('POST',$endPoint,[
            'body' => Json::encode(['list' => [ArrayHelper::ArrayFilterRecursive($createOrder->toArray())]])
        ]);
    }

    /**
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param null $status
     * @param null $sync
     * @return array
     * @throws \Exception
     */
    public function all($page=1,$start_date = null,$end_date = null,$status = null,$sync = null)
    {
        $orders = [];

        $endPoint = "/order/page={$page}/";

        $query = ['start_date' => $start_date,'end_date' => $end_date,'status' => $status,'sync' => $sync];

        try{
            $response = $this->client->request('GET',$endPoint,[
                'query' => $query
            ]);
        }catch (GuzzleException $e){
            $response = $e->getResponse();
            Yii::error($response->getBody(),__METHOD__);
        }

        $orderResponse = ArrayHelper::getValue(Json::decode($response->getBody()),'orders');

        foreach ($orderResponse as $order) {
            $orders[] = new Order($order);
        }

        return $orders;
    }

    /**
     * @param array $updateOrders
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function updateMultible(array $updateOrders)
    {
        $endPoint = "/order/";

        $requestData = [];

        foreach ($updateOrders as $updateOrder) {
            $requestData[] = array_filter($updateOrder->toArray());
        }

        return $this->client->request('PUT',$endPoint,[
            'body' => Json::encode(['list' => $requestData])
        ]);
    }

    /**
     * @param UpdateOrder $updateOrder
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function update(UpdateOrder $updateOrder)
    {
        $endPoint = "/order/";

        return $this->client->request('PUT',$endPoint,[
            'body' => Json::encode(['list' => [array_filter($updateOrder->toArray())]])
        ]);
    }
}