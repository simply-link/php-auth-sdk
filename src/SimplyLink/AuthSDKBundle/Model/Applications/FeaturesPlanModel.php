<?php

namespace SimplyLink\AuthSDKBundle\Model\Applications;

use SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject;
use JMS\Serializer\Annotation as JMS;


/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 20/08/2017
 * Time: 14:22
 */
class FeaturesPlanModel extends BaseSimplyLinkApiObject
{
    
    const FEATURE_PLAN_BASIC = 1;
    const FEATURE_PLAN_PLUS = 2;
    const FEATURE_PLAN_PREMIUM = 3;
    
    
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
     * @return FeaturesPlanModel
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isBasic()
    {
        return ($this->getId() == self::FEATURE_PLAN_BASIC);
    }
    
    /**
     * @return bool
     */
    public function isPlus()
    {
        return ($this->getId() == self::FEATURE_PLAN_PLUS);
    }
    
    /**
     * @return bool
     */
    public function isPremium()
    {
        return ($this->getId() == self::FEATURE_PLAN_PREMIUM);
    }
    
    
}