<?php

namespace SimplyLink\AuthSDKBundle\Model\Users;

use SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject;
use SimplyLink\AuthSDKBundle\Model\Generics\LanguagesModel;
use JMS\Serializer\Annotation as JMS;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 02/11/2017
 * Time: 15:31
 */
class LoginTokenModel extends BaseSimplyLinkApiObject
{
    
    /**
     * @var string
     * @JMS\SerializedName("user")
     * @JMS\Accessor(getter="getUser",setter="setUser")
     * @JMS\Type("string")
     */
    protected $user;
    
    /**
     * @var \DateTime
     * @JMS\SerializedName("expired")
     * @JMS\Accessor(getter="getExpired",setter="setExpired")
     * @JMS\Type("datetime")
     */
    protected $expired;
    
    /**
     * @var string
     * @JMS\SerializedName("loginToken")
     * @JMS\Accessor(getter="getLoginToken",setter="setLoginToken")
     * @JMS\Type("string")
     */
    protected $loginToken;
    
    
    /**
     * @var string
     * @JMS\SerializedName("redirectUrl")
     * @JMS\Accessor(getter="getRedirectUrl",setter="setRedirectUrl")
     * @JMS\Type("string")
     */
    protected $redirectUrl;
    
    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * @param string $user
     * @return LoginTokenModel
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getExpired()
    {
        return $this->expired;
    }
    
    /**
     * @param \DateTime $expired
     * @return LoginTokenModel
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLoginToken()
    {
        return $this->loginToken;
    }
    
    /**
     * @param string $loginToken
     * @return LoginTokenModel
     */
    public function setLoginToken($loginToken)
    {
        $this->loginToken = $loginToken;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }
    
    /**
     * @param string $redirectUrl
     * @return LoginTokenModel
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }
    
}