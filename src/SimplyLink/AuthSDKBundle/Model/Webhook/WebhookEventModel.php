<?php

namespace Simplylink\AuthSDKBundle\Model\Webhook;

use JMS\Serializer\Annotation as JMS;
use Simplylink\AuthSDKBundle\Utils\SLDateTime;
use Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 20/09/2017
 * Time: 15:07
 */
class WebhookEventModel extends BaseWebhookModel
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
     * @JMS\SerializedName("creatorClientId")
     * @JMS\Accessor(getter="getCreatorClientId",setter="setCreatorClientId")
     * @JMS\Type("int")
     */
    protected $creatorClientId;
    
    
    /**
     * @var array
     * @JMS\SerializedName("eventData")
     * @JMS\Accessor(getter="getEventData",setter="setEventData")
     * @JMS\Type("array")
     */
    protected $eventData;
    
    
    /**
     * @var \DateTime
     * @JMS\SerializedName("createdAt")
     * @JMS\Accessor(getter="getCreatedAt",setter="setCreatedAt")
     * @JMS\Type("Simplylink\AuthSDKBundle\Utils\SLDateTime")
     */
    protected $createdAt;
    
    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }
    
    /**
     * @param string $action Values must be  CREATE / UPDATE / DELETE
     * @return WebhookEventModel
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
     * @return WebhookEventModel
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCreatorClientId()
    {
        return $this->creatorClientId;
    }
    
    /**
     * @param int $creatorClientId
     * @return WebhookEventModel
     */
    public function setCreatorClientId($creatorClientId)
    {
        $this->creatorClientId = $creatorClientId;
        return $this;
    }
    
    /**
     * @return array
     */
    public function getEventData()
    {
        return $this->eventData;
    }
    
    /**
     * @param array $eventData
     * @return WebhookEventModel
     */
    public function setEventData($eventData)
    {
        $this->eventData = $eventData;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * @param \DateTime $createdAt
     * @return WebhookEventModel
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    
}