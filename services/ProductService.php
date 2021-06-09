<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 6/4/21
 * @time: 2:15 PM
 */

namespace mhunesi\entegra\services;

use Yii;
use yii\helpers\Json;
use GuzzleHttp\Client;
use yii\base\BaseObject;
use mhunesi\entegra\model\Product;

class ProductService extends BaseObject
{
    /** @var Client */
    public $client;

    public function all($page=1)
    {
        $endPoint = "/product/page={$page}/";

        $response = $this->client->request('GET',$endPoint);

        return Json::decode($response->getBody());
    }


    public function create(Product $product)
    {
        $endPoint = "/product/";

        $response = $this->client->request('POST',$endPoint,[
            'body' => Json::encode(['list' => [array_filter($product->toArray())]])
        ]);

        return Json::decode($response->getBody());
    }


    public function update(Product $product)
    {
        $endPoint = "/product/";

        $response = $this->client->request('PUT',$endPoint,[
            'body' => Json::encode(['list' => [array_filter($product->toArray())]])
        ]);

        return Json::decode($response->getBody());
    }

}