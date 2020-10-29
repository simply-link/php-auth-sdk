<?php

namespace SimplyLink\AuthSDKBundle\Model\Organizations;

use SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject;
use JMS\Serializer\Annotation as JMS;


class OrganizationRolesModel extends BaseSimplyLinkApiObject
{
    
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
     * @return OrganizationRolesModel
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    
    
}