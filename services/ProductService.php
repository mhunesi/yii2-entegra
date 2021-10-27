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

use mhunesi\entegra\model\UpdateProduct;
use yii\helpers\Json;
use GuzzleHttp\Client;
use yii\base\BaseObject;
use mhunesi\entegra\model\Product;
use mhunesi\entegra\model\CreateProduct;
use mhunesi\entegra\helpers\ArrayHelper;

class ProductService extends BaseObject
{
    /** @var Client */
    public $client;

    /**
     * @param int $page
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function all($page=1)
    {
        $products = [];

        $endPoint = "/product/page={$page}/";

        $response = $this->client->request('GET',$endPoint);

        return ArrayHelper::getValue(Json::decode($response->getBody()),'porductList');
    }


    /**
     * @param CreateProduct[] $products
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $products)
    {
        foreach ($products as $k => $product) {
            $products[$k] = ArrayHelper::ArrayFilterRecursive($product->toArray());
        }

        $endPoint = "/product/";

        return $this->client->request('POST',$endPoint,[
            'body' => Json::encode(['list' => $products])
        ]);
    }


    /**
     * @param UpdateProduct[] $products
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(array $products)
    {
        foreach ($products as $k => $product) {
            $products[$k] = ArrayHelper::ArrayFilterRecursive($product->toArray());
        }

        $endPoint = "/product/";

        return $this->client->request('PUT',$endPoint,[
            'body' => Json::encode(['list' => $products])
        ]);
    }

}