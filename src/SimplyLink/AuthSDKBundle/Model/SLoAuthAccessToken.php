<?php

namespace SimplyLink\AuthSDKBundle\Model;

use SimplyLink\UtilsBundle\Utils\GenericDataManager;
use Doctrine\ORM\Mapping as ORM;


/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 15/08/2017
 * Time: 11:59
 */
class SLoAuthAccessToken
{
    /**
     * @var int
     */
    protected $startTimestamp;
    
    /**
     * @var string
     * @ORM\Column(name="access_token", type="string", length=255)
     */
    protected $accessToken;
    
    /**
     * @var int
     */
    protected $expiresIn;
    
    /**
     * @var int
     * @ORM\Column(name="expiration_timestamp", type="integer")
     */
    protected $expirationTimestamp;
    
    /**
     * @var string
     * @ORM\Column(name="token_type", type="string", length=255)
     */
    protected $tokenType;
    
    /**
     * @var string
     * @ORM\Column(name="scope", type="string", length=255, nullable=true)
     */
    protected $scope;
    
    /**
     * @var string
     * @ORM\Column(name="refresh_token", type="string", length=255)
     */
    protected $refreshToken;
    
    
    /**
     * SLoAuthAccessToken constructor.
     */
    public function __construct()
    {
        $this->startTimestamp = (new \DateTime())->getTimestamp(); // set current timestamp
    }
    
    
    
    /**
     * @param $tokenResponse
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function parseTokenResponse($tokenResponse)
    {
        if(!$tokenResponse || !is_array($tokenResponse))
            return;
        
        
        $this
            ->setAccessToken(GenericDataManager::getArrayValueForKey($tokenResponse,'access_token'))
            ->setExpiresIn(GenericDataManager::getArrayValueForKey($tokenResponse,'expires_in'))
            ->setExpirationTimestamp($this->getStartTimestamp() + $this->getExpiresIn())
            ->setTokenType(GenericDataManager::getArrayValueForKey($tokenResponse,'token_type'))
            ->setScope(GenericDataManager::getArrayValueForKey($tokenResponse,'scope'))
            ->setRefreshToken(GenericDataManager::getArrayValueForKey($tokenResponse,'refresh_token'));
        
        return;
    }
    
    
    /**
     * @return int
     */
    public function getStartTimestamp()
    {
        return $this->startTimestamp;
    }
    
    /**
     * @param int $startTimestamp
     * @return SLoAuthAccessToken
     */
    public function setStartTimestamp($startTimestamp)
    {
        $this->startTimestamp = $startTimestamp;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
    
    /**
     * @param string $accessToken
     * @return SLoAuthAccessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }
    
    /**
     * @param int $expiresIn
     * @return SLoAuthAccessToken
     */
    public function setExpiresIn($expiresIn)
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getExpirationTimestamp()
    {
        return $this->expirationTimestamp;
    }
    
    /**
     * @param int $expirationTimestamp
     * @return SLoAuthAccessToken
     */
    public function setExpirationTimestamp($expirationTimestamp)
    {
        $this->expirationTimestamp = $expirationTimestamp;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTokenType()
    {
        return $this->tokenType;
    }
    
    /**
     * @param string $tokenType
     * @return SLoAuthAccessToken
     */
    public function setTokenType($tokenType)
    {
        $this->tokenType = $tokenType;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }
    
    /**
     * @param string $scope
     * @return SLoAuthAccessToken
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }
    
    /**
     * @param string $refreshToken
     * @return SLoAuthAccessToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }
    
    
    /**
     * Get value for Authorization header.
     * For example: 'Bearer 1234567890'
     *
     * @return null|string
     */
    public function getAuthorizationHeaderValue()
    {
        if($this->getAccessToken())
            return ucfirst($this->getTokenType()) . ' ' . $this->getAccessToken();
        return null;
    }
    
    
    /**
     * Is the access token valid for use
     *
     * @return bool
     */
    public function isValid()
    {
        if($this->getAccessToken() && strlen($this->getAccessToken()) > 0)
        {
            if($this->getExpirationTimestamp() > 0  && $this->getExpirationTimestamp() > (new \DateTime())->getTimestamp())
                return true;
        }
        
        return false;
    }
    
    
    
}