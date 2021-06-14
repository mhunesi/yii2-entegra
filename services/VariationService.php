<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 6/14/21
 * @time: 10:24 AM
 */

namespace mhunesi\entegra\services;


use yii\helpers\Json;
use GuzzleHttp\Client;
use yii\base\BaseObject;
use mhunesi\entegra\model\Variant;

class VariationService extends BaseObject
{
    /** @var Client */
    public $client;

    public function update(Variant $variant)
    {
        $endPoint = "/variations/";

        $response = $this->client->request('PUT',$endPoint,[
            'body' => Json::encode(['list' => [array_filter($variant->toArray())]])
        ]);

        return Json::decode($response->getBody());
    }


    public function create(Variant $variant)
    {
        $endPoint = "/variations/";

        $response = $this->client->request('POST',$endPoint,[
            'body' => Json::encode(['list' => [array_filter($variant->toArray())]])
        ]);

        return Json::decode($response->getBody());
    }

}