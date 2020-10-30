<?php

namespace Simplylink\AuthSDKBundle\Model\Generics;

use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use JMS\Serializer\Annotation as JMS;

class LanguagesModel extends BaseSimplylinkApiObject
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
     * @JMS\SerializedName("code")
     * @JMS\Accessor(getter="getCode",setter="setCode")
     * @JMS\Type("string")
     */
    protected $code;
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     * @return LanguagesModel
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    
    /**
     * @param string $code
     * @return LanguagesModel
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
    
    
    


}
