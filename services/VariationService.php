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


use mhunesi\entegra\helpers\ArrayHelper;
use yii\helpers\Json;
use GuzzleHttp\Client;
use yii\base\BaseObject;
use mhunesi\entegra\model\Variant;

class VariationService extends BaseObject
{
    /** @var Client */
    public $client;

    /**
     * @param Variant[] $variants
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(array $variants)
    {
        $endPoint = "/variations/";

        foreach ($variants as $k => $variant) {
            $variants[$k] = ArrayHelper::ArrayFilterRecursive($variant->toArray());
        }

        $response = $this->client->request('PUT',$endPoint,[
            'body' => Json::encode(['list' => $variants])
        ]);

        return Json::decode($response->getBody());
    }

    /**
     * @param Variant[] $variants
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $variants)
    {
        $endPoint = "/variations/";

        foreach ($variants as $k => $variant) {
            $variants[$k] = ArrayHelper::ArrayFilterRecursive($variant->toArray());
        }

        return $this->client->request('POST',$endPoint,[
            'body' => Json::encode(['list' => $variants])
        ]);
    }

}