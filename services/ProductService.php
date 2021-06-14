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

use mhunesi\entegra\model\CreateProduct;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use GuzzleHttp\Client;
use yii\base\BaseObject;
use mhunesi\entegra\model\Product;

class ProductService extends BaseObject
{
    /** @var Client */
    public $client;

    /**
     * @param int $page
     * @return Product[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function all($page=1)
    {
        $products = [];

        $endPoint = "/product/page={$page}/";

        $response = $this->client->request('GET',$endPoint);

        $productResponse = ArrayHelper::getValue(Json::decode($response->getBody()),'porductList');

        foreach ($productResponse as $item) {
            $products[] = new Product($item);
        }

        return $products;
    }


    public function create(CreateProduct $product)
    {
        $endPoint = "/product/";

        $response = $this->client->request('POST',$endPoint,[
            'body' => Json::encode(['list' => [\mhunesi\entegra\helpers\ArrayHelper::ArrayFilterRecursive($product->toArray())]])
        ]);

        return Json::decode($response->getBody());
    }


    public function update(CreateProduct $product)
    {
        $endPoint = "/product/";

        $response = $this->client->request('PUT',$endPoint,[
            'body' => Json::encode(['list' => [array_filter($product->toArray())]])
        ]);

        return Json::decode($response->getBody());
    }

}