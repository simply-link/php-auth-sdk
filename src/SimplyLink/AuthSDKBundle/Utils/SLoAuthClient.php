<?php
/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 22/08/2017
 * Time: 11:50
 */

namespace Simplylink\AuthSDKBundle\Utils;


use GuzzleHttp\Client;
use Simplylink\AuthSDKBundle\Api\BaseSimplylinkConnector;
use Simplylink\AuthSDKBundle\Model\SLoAuthAccessToken;

class SLoAuthClient
{
    
    const HTTP_METHOD_POST = 'POST';
    const HTTP_METHOD_GET = 'GET';
    const HTTP_METHOD_PUT = 'PUT';
    
    
    /**
     * @var Client
     */
    private $httpClient;
    
    /**
     * @var string
     */
    private $clientId;
    
    /**
     * @var string
     */
    private $clientSecret;
    
    /**
     * @var string
     */
    private $redirectUri;
    
    /**
     * @var SLoAuthAccessToken
     */
    private $accessToken;
    
    /**
     * SLoAuthClient constructor.
     *
     * @param string $clientId
     * @param string $clientSecret
     * @param string $redirectUri
     */
    public function __construct($clientId, $clientSecret, $redirectUri)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
        
        $this->httpClient = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->getAuthServerBaseUrl()
        ]);
    }
    
    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }
    
    
    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }
    
    /**
     * @param string $clientId
     * @return SLoAuthClient
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }
    
    /**
     * @param string $clientSecret
     * @return SLoAuthClient
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }
    
    /**
     * @param string $redirectUri
     * @return SLoAuthClient
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
        return $this;
    }
    
    /**
     * @return SLoAuthAccessToken
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
    
    /**
     * @param SLoAuthAccessToken $accessToken
     * @return SLoAuthClient
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }
    
    
    
    
    
    public function getAuthServerBaseUrl()
    {
        $domain = BaseSimplylinkConnector::getDomainForEnvironment();
    
        return 'https://auth.' . $domain;
    }
    
    
    public function getEndPointAuth()
    {
        return $this->getAuthServerBaseUrl() . '/oauth/v2/auth';
    }
    
    
    public function getEndPointToken()
    {
        return $this->getAuthServerBaseUrl() . '/oauth/v2/token';
    }
    
    
    
    
    
    
    
    
}