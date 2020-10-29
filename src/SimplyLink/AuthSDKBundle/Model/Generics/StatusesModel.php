<?php

namespace SimplyLink\AuthSDKBundle\Model\Generics;

use SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject;
use JMS\Serializer\Annotation as JMS;

class StatusesModel extends BaseSimplyLinkApiObject
{
    const Enable = 1;
    const Disable = 2;
    const Pending = 3;
    const Deleted = 4;
    
    /**
     * @var string
     * @JMS\SerializedName("name")
     * @JMS\Accessor(getter="getName",setter="setName")
     * @JMS\Type("string")
     */
    protected $name;
    
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     * @return StatusesModel
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

 
    
    
}
