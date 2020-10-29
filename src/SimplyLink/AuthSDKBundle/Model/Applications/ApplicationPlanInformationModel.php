<?php

namespace SimplyLink\AuthSDKBundle\Model\Applications;

use SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject;
use SimplyLink\AuthSDKBundle\Model\Generics\CurrenciesModel;
use JMS\Serializer\Annotation as JMS;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 20/08/2017
 * Time: 14:22
 */
class ApplicationPlanInformationModel extends BaseSimplyLinkApiObject
{
    /**
     * @var float
     * @JMS\SerializedName("price")
     * @JMS\Accessor(getter="getPrice",setter="setPrice")
     * @JMS\Type("float")
     */
    protected $price;
    
    /**
     * @var CurrenciesModel
     * @JMS\SerializedName("name")
     * @JMS\Accessor(getter="getCurrency",setter="setCurrency")
     * @JMS\Type("SimplyLink\AuthSDKBundle\Model\Generics\CurrenciesModel")
     */
    protected $currency;
    
    /**
     * @var int
     * @JMS\SerializedName("trailDays")
     * @JMS\Accessor(getter="getTrailDays",setter="setTrailDays")
     * @JMS\Type("int")
     */
    protected $trailDays;
    
    /**
     * @var array
     *
     * array of [ "feature":"", "info":"info link url" ]
     * @JMS\SerializedName("features")
     * @JMS\Accessor(getter="getFeatures",setter="setFeatures")
     * @JMS\Type("array<array<string, string>>")
     */
    protected $features;
    
    
    /**
     * @var FeaturesPlanModel
     * @JMS\SerializedName("plan")
     * @JMS\Accessor(getter="getFeaturesPlan",setter="setFeaturesPlan")
     * @JMS\Type("SimplyLink\AuthSDKBundle\Model\Applications\FeaturesPlanModel")
     */
    protected $featuresPlan;
    
    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * @param float $price
     * @return ApplicationPlanInformationModel
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
    
    /**
     * @return CurrenciesModel
     */
    public function getCurrency()
    {
        return $this->currency;
    }
    
    /**
     * @param CurrenciesModel $currency
     * @return ApplicationPlanInformationModel
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTrailDays()
    {
        return $this->trailDays;
    }
    
    /**
     * @param int $trailDays
     * @return ApplicationPlanInformationModel
     */
    public function setTrailDays($trailDays)
    {
        $this->trailDays = $trailDays;
        return $this;
    }
    
    /**
     * @return array
     */
    public function getFeatures()
    {
        return $this->features;
    }
    
    /**
     * @param array $features
     * @return ApplicationPlanInformationModel
     */
    public function setFeatures($features)
    {
        $this->features = $features;
        return $this;
    }
    
    /**
     * @return FeaturesPlanModel
     */
    public function getFeaturesPlan()
    {
        return $this->featuresPlan;
    }
    
    /**
     * @param FeaturesPlanModel $featuresPlan
     * @return ApplicationPlanInformationModel
     */
    public function setFeaturesPlan($featuresPlan)
    {
        $this->featuresPlan = $featuresPlan;
        return $this;
    }
    
    
    
    
    
    /**
     * @return bool
     */
    public function isBasic()
    {
        return $this->getFeaturesPlan()->isBasic();
    }
    
    /**
     * @return bool
     */
    public function isPlus()
    {
        return $this->getFeaturesPlan()->isPlus();
    }
    
    /**
     * @return bool
     */
    public function isPremium()
    {
        return $this->getFeaturesPlan()->isPremium();
    }
    
    
    
    
}