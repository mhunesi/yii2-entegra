<?php

namespace mhunesi\entegra;

use mhunesi\entegra\services\OrderService;
use mhunesi\entegra\services\ProductService;
use mhunesi\entegra\services\VariationService;
use Yii;
use yii\helpers\Json;
use GuzzleHttp\Client;
use yii\base\Component;
use yii\base\ErrorException;
use yii\helpers\ArrayHelper;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Exception\RequestException;

/**
 * This is just an example.
 */
class Entegra extends Component
{
    /**
     * @var string
     */
    public $url = "https://apiv2.entegrabilisim.com";

    /**
     * @var string
     */
    public $email = 'apitest@entegrabilisim.com';

    /**
     * @var string
     */
    public $password = 'apitest';

    /**
     * @var string
     */
    private $access_token;

    /**
     * @var string
     */
    private $refresh_token;

    /**
     * @var Client|array
     */
    public $client;

    /**
     * @var string
     */
    public $cache = 'cache';

    /**
     * @var string
     */
    public $cacheKPrefix = 'entegraV2';

    /**
     * @throws ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \GuzzleHttp\Exception\InvalidArgumentException
     */
    public function init()
    {
        
        $this->access_token = Yii::$app->cache->get("{$this->cacheKPrefix}_access_token");
        $this->refresh_token = Yii::$app->cache->get("{$this->cacheKPrefix}_refresh_token");

        $this->initClient();
        $this->authenticate();
    }

    /**
     * @return ProductService
     */
    public function productService()
    {
        return new ProductService([
           'client' => $this->client
        ]);
    }

    /**
     * @return OrderService
     */
    public function orderService()
    {
        return new OrderService([
           'client' => $this->client
        ]);
    }

    /**
     * @return VariationService
     */
    public function variantService()
    {
        return new VariationService([
           'client' => $this->client
        ]);
    }

    /**
     * @param $method
     * @param string $uri
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $uri = '', array $options = [])
    {
        try {
            $response = $this->client->request($method, $uri, $options);
        } catch (RequestException $e) {
            $request = Message::toString($e->getRequest());
            $response = $e->getResponse();
            if (method_exists($e, 'getResponse') && $e->getResponse()->getStatusCode() === 500) {
                Yii::error('Api exception: ' . $e->getMessage() . " Request: " . $request, __METHOD__);
            }
        }
        return $response;
    }

    /**
     * Authorize Method
     * @return bool
     * @throws ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \GuzzleHttp\Exception\InvalidArgumentException
     */
    private function authenticate()
    {
        if (!$this->access_token) {
            $response = $this->request('POST', '/api/user/token/obtain/', [
                'body' => Json::encode([
                    'email' => $this->email,
                    'password' => $this->password,
                ])
            ]);

            try {
                $body = Json::decode($response->getBody());
            } catch (\Exception $e) {
                Yii::error($e->getMessage(), __METHOD__);
                $responseString = Message::toString($response);
                throw new ErrorException("JSON Error: {$e->getMessage()} Response: {$responseString}");
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode === 201) {
                $this->access_token = ArrayHelper::getValue($body, 'access');
                $this->refresh_token = ArrayHelper::getValue($body, 'refresh');

                Yii::$app->cache->set("{$this->cacheKPrefix}_access_token",$this->access_token,3600 * 24 * 30);
                Yii::$app->cache->set("{$this->cacheKPrefix}_refresh_token",$this->refresh_token,3600 * 24 * 30);

            }else
            {   
                    
                $responseString = Message::toString($response);
                throw new ErrorException("Authenticate Error => Response: {$responseString}");

            }

        }
        $this->initClient([
            'headers' => [
                'Authorization' => "JWT {$this->access_token}",
            ]
        ]);

        return true;
    }

    /**
     * @return bool
     * @throws ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function refreshToken()
    {
        $response = $this->request('POST', '/api/user/token/refresh/', [
            'body' => Json::encode([
                'refresh' => $this->refresh_token
            ])
        ]);

        try {
            $body = Json::decode($response->getBody());
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), __METHOD__);
            $responseString = Message::toString($response);
            throw new ErrorException("JSON Error: {$e->getMessage()} Response: {$responseString}");
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $this->access_token = ArrayHelper::getValue($body, 'access');
            $this->refresh_token = ArrayHelper::getValue($body, 'refresh');
            $this->initClient([
                'headers' => ['Authorization' => "JWT {$this->access_token}"]
            ]);

            return true;
        }

        $responseString = Message::toString($response);

        throw new ErrorException("Authenticate Error => Response: {$responseString}");
    }

    /**
     * Init Client
     * @param array $config
     * @throws \GuzzleHttp\Exception\InvalidArgumentException
     */
    private function initClient($config = [])
    {
        $this->client = new Client(ArrayHelper::merge([
            'verify' => false,
            'debug' => false,
            'base_uri' => $this->url,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent'=>'PostmanRuntime/7.26.8'
            ],
        ], $config));
    }
}
