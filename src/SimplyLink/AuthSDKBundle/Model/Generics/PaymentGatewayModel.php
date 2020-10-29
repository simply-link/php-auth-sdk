<?php

namespace SimplyLink\AuthSDKBundle\Model\Generics;


use SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject;
use JMS\Serializer\Annotation as JMS;

class PaymentGatewayModel extends BaseSimplyLinkApiObject
{

    /**
     * @var string
     * @JMS\SerializedName("name")
     * @JMS\Accessor(getter="getName",setter="setName")
     * @JMS\Type("string")
     */
    protected $name;
    
    /**
     * @var string
     * @JMS\SerializedName("canonical")
     * @JMS\Accessor(getter="getCanonical",setter="setCanonical")
     * @JMS\Type("string")
     */
    protected $canonical;
    
    /**
     * @var string
     * @JMS\SerializedName("imageUrl")
     * @JMS\Accessor(getter="getImageUrl",setter="setImageUrl")
     * @JMS\Type("string")
     */
    protected $imageUrl;
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     * @return PaymentGatewayModel
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCanonical()
    {
        return $this->canonical;
    }
    
    /**
     * @param string $canonical
     * @return PaymentGatewayModel
     */
    public function setCanonical($canonical)
    {
        $this->canonical = $canonical;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }
    
    /**
     * @param string $imageUrl
     * @return PaymentGatewayModel
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    
    
    
}
