<?php

namespace SimplyLink\AuthSDKBundle\Utils;

use SimplyLink\AuthSDKBundle\Model\SLoAuthAccessToken;
use SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionRuntime;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 15/08/2017
 * Time: 11:59
 *
 * This class is using GuzzleHttp Package.
 * For more information @see http://docs.guzzlephp.org/en/stable/
 */
class SLoAuthConnector
{
    /**
     * @var SLoAuthClient
     */
    private $client;
    
    
    /**
     * SLoAuthConnector constructor.
     *
     * @param SLoAuthClient $client
     */
    public function __construct(SLoAuthClient $client)
    {
        $this->client = $client;
    }
    
    /**
     * @return SLoAuthClient
     */
    public function getClient()
    {
        return $this->client;
    }
    
    
    /**
     * Get url for requesting the resource owner for authorization code
     *
     * @param array $scope Authorization scope - Optional
     * @param string $state Client state - Optional
     * @return string Url for getting the resource owner authorization
     */
    public function getAuthorizationCodeUrl(array $scope = array(), $state = null)
    {
        $params = [
            'response_type' => 'code',
            'client_id'     => $this->client->getClientId(),
            'redirect_uri'  => $this->client->getRedirectUri()
        ];
        
        $scopeString = '';
        if($scope && is_array($scope) && count($scope) > 0)
            $scopeString = implode(",",$scope);
        
        
        if($scopeString && strlen($scopeString) > 0) // OPTIONAL
            $params['scope'] = $scopeString;
        
        
        if($state && strlen($state) > 0) // OPTIONAL
            $params['state'] = $state;
        
        
        return $this->getClient()->getEndPointAuth() . '?' . http_build_query($params, null, '&');
    }
    
    /**
     * Get AccessToken from AuthorizationCode
     *
     * @param string $authorizationCode
     * @return SLoAuthAccessToken
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getAccessTokenFromAuthCode($authorizationCode)
    {
        return $this->getAccessToken([
            'code' => $authorizationCode,
            'grant_type' => 'authorization_code'
        ]);
    }
    
    /**
     * Get AccessToken from RefreshToken
     *
     * @param string $refreshToken
     * @return SLoAuthAccessToken
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getAccessTokenFromRefreshToken($refreshToken)
    {
        return $this->getAccessToken([
            'refresh_token' => $refreshToken,
            'grant_type' => 'refresh_token'
        ]);
    }
    
    /**
     * Get AccessToken from Client Credentials.
     * This token is not related to any user.
     *
     * @param array $scope Array of scopes
     * @return SLoAuthAccessToken
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getAccessTokenFromClientCredentials(array $scope = array())
    {
        return $this->getAccessToken([
            'grant_type' => 'client_credentials',
            'scope' => implode(" ",$scope)
        ]);
    }
    
    /**
     * Get AccessToken from User credentials
     *
     * @param string $userEmail
     * @param string $userPassword
     * @param array $scope Array of scopes
     * @return SLoAuthAccessToken
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getAccessTokenFromUserCredentials($userEmail, $userPassword,array $scope = array())
    {
        return $this->getAccessToken([
            'grant_type' => 'password',
            'username' => $userEmail,
            'password' => $userPassword,
            'scope' => implode(" ",$scope)
        ]);
    }
    
    /**
     * Get AccessToken from User username only
     *
     * @param string $userEmail
     * @param array $scope Array of scopes
     * @return SLoAuthAccessToken
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getAccessTokenFromUsernameOnly($userEmail,array $scope = array())
    {
        return $this->getAccessToken([
            'grant_type' => 'http://simplylink.io/grants/login_by_username',
            'username' => $userEmail,
            'scope' => implode(" ",$scope)
        ]);
    }
    
    
    /**
     * Get access token from the Token endpoint.
     *
     * @param array $additionalParams
     * @return SLoAuthAccessToken
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    private function getAccessToken(array $additionalParams)
    {
        $params = [
            'redirect_uri' => $this->client->getRedirectUri(),
            'client_id' => $this->client->getClientId(),
            'client_secret' => $this->client->getClientSecret(),
        ];
    
        $params = array_merge($params,$additionalParams);
    
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
    
    
        $response = $this->client->getHttpClient()->request(SLoAuthClient::HTTP_METHOD_POST, $this->getClient()->getEndPointToken(),[
            'headers' => $headers,
            'form_params' => $params
        ]);
    
    
        $tokenResponse = new SLoAuthAccessToken();
    
        if($response->getStatusCode() == 200)
        {
            $array = json_decode($response->getBody()->getContents(), true);
            $tokenResponse->parseTokenResponse($array);
            $this->getClient()->setAccessToken($tokenResponse);
        }
    
        return $tokenResponse;
    }
    
    
    
    /**
     * @param $protectedResourceUrl
     * @param array $parameters
     * @param string $httpMethod
     * @param array $headers
     * @return array|mixed
     * @throws SLExceptionRuntime
     */
    public function fetchDataFromProtectedResource($protectedResourceUrl, $parameters = array(), $httpMethod = SLoAuthClient::HTTP_METHOD_GET, array $headers = array())
    {
        if(!($this->client->getAccessToken() && $this->client->getAccessToken()->isValid()))
            throw new SLExceptionRuntime('Access token does not exists or invalid','Access token does not exists or invalid');
            
        $headers['Authorization'] = $this->client->getAccessToken()->getAuthorizationHeaderValue();
        
        $options = [];
        $options['headers'] = $headers;
        
        if($parameters && count($parameters) > 0)
            $options['form_params'] = $parameters;
        
        $response = $this->client->getHttpClient()->request($httpMethod,$protectedResourceUrl,$options);
        
        $responseArray = [];
        try{
            $responseArray = json_decode($response->getBody()->getContents(), true);
        }
        catch (\Exception $e)
        {}
        
        return $responseArray;
    }
    
    
    /**
     * Use this function in case of user logout
     *
     * @return array|null
     * @throws SLExceptionRuntime
     */
    public function terminateAccessToken()
    {
        if(!($this->client->getAccessToken() && $this->client->getAccessToken()->isValid()))
            throw new SLExceptionRuntime('Access token does not exists or invalid','Access token does not exists or invalid');
        
    
        $params = [
            'client_id' => $this->client->getClientId(),
            'client_secret' => $this->client->getClientSecret(),
        ];
    
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => $this->client->getAccessToken()->getAuthorizationHeaderValue()
        ];
    
    
        $response = $this->client->getHttpClient()->request(SLoAuthClient::HTTP_METHOD_POST, $this->getClient()->getAuthServerBaseUrl() .'/oauth/v2/terminate',[
            'headers' => $headers,
            'form_params' => $params
        ]);
    
    
        $responseArray = null;
        
        if($response->getStatusCode() == 200)
        {
            $responseArray = json_decode($response->getBody()->getContents(), true);
        }
    
        return $responseArray;
    }
    
    
    /**
     * Get authorized user details.
     *
     * Use this function only after Access Token is created
     *
     * @return array|mixed
     * @throws SLExceptionRuntime
     */
    public function getUserDetails()
    {
        return $this->fetchDataFromProtectedResource($this->getClient()->getAuthServerBaseUrl() . '/api/user/me');
    }
    
    
    
    
    
    
    
}