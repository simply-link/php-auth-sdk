<?php

namespace Simplylink\AuthSDKBundle\Model\Organizations;

use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use JMS\Serializer\Annotation as JMS;


class OrganizationRolesModel extends BaseSimplylinkApiObject
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