<?php
/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 22/08/2017
 * Time: 12:16
 */

namespace SimplyLink\AuthSDKBundle\Model\Generics;

use SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject;
use JMS\Serializer\Annotation as JMS;


class CountriesModel extends BaseSimplyLinkApiObject
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
     * @return CountriesModel
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
     * @return CountriesModel
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
    
    
    
    
}