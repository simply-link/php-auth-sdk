<?php

namespace Simplylink\AuthSDKBundle\Model\Generics;

use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use JMS\Serializer\Annotation as JMS;

class CurrenciesModel extends BaseSimplylinkApiObject
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
     * @var string
     * @JMS\SerializedName("symbol")
     * @JMS\Accessor(getter="getSymbol",setter="setSymbol")
     * @JMS\Type("string")
     */
    protected $symbol;
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     * @return CurrenciesModel
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
     * @return CurrenciesModel
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }
    
    /**
     * @param string $symbol
     * @return CurrenciesModel
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
        return $this;
    }
    
    
    

    
}
