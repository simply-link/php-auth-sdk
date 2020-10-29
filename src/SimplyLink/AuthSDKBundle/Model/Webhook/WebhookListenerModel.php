<?php

namespace SimplyLink\AuthSDKBundle\Model\Webhook;

use JMS\Serializer\Annotation as JMS;
use SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 20/09/2017
 * Time: 15:23
 */
class WebhookListenerModel extends BaseWebhookModel
{
    /**
     * @var string
     * @JMS\SerializedName("action")
     * @JMS\Accessor(getter="getAction",setter="setAction")
     * @JMS\Type("string")
     */
    protected $action;
    
    /**
     * @var string
     * @JMS\SerializedName("namespace")
     * @JMS\Accessor(getter="getNamespace",setter="setNamespace")
     * @JMS\Type("string")
     */
    protected $namespace;
    
    
    /**
     * @var integer
     * @JMS\SerializedName("ownerClientId")
     * @JMS\Accessor(getter="getOwnerClientId",setter="setOwnerClientId")
     * @JMS\Type("int")
     */
    protected $ownerClientId;
    
    
    /**
     * @var boolean
     * @JMS\SerializedName("isActive")
     * @JMS\Accessor(getter="isIsActive",setter="setIsActive")
     * @JMS\Type("boolean")
     */
    protected $isActive;
    
    
    /**
     * @var string
     * @JMS\SerializedName("webhookUrl")
     * @JMS\Accessor(getter="getWebhookUrl",setter="setWebhookUrl")
     * @JMS\Type("string")
     */
    protected $webhookUrl;
    
    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }
    
    /**
     * @param string $action Values must be  CREATE / UPDATE / DELETE
     * @return WebhookListenerModel
     * @throws SLExceptionInvalidArgument
     */
    public function setAction($action)
    {
        if(!is_string($action))
            throw SLExceptionInvalidArgument::expectedString('$action',$action);
        
        if($action != self::WEBHOOK_ACTION_CREATE &&
            $action != self::WEBHOOK_ACTION_UPDATE &&
            $action != self::WEBHOOK_ACTION_DELETE)
            throw new SLExceptionInvalidArgument('invalid value for argument $action. expected CREATE / UPDATE / DELETE, given: ' . $action,'Oops - unexpected value');
            
        $this->action = $action;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }
    
    /**
     * @param string $namespace
     * @return WebhookListenerModel
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getOwnerClientId()
    {
        return $this->ownerClientId;
    }
    
    /**
     * @param int $ownerClientId
     * @return WebhookListenerModel
     */
    public function setOwnerClientId($ownerClientId)
    {
        $this->ownerClientId = $ownerClientId;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isIsActive()
    {
        return $this->isActive;
    }
    
    /**
     * @param bool $isActive
     * @return WebhookListenerModel
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getWebhookUrl()
    {
        return $this->webhookUrl;
    }
    
    /**
     * @param string $webhookUrl
     * @return WebhookListenerModel
     */
    public function setWebhookUrl($webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;
        return $this;
    }
    
    
    
    
}