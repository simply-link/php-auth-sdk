<?php

namespace SimplyLink\AuthSDKBundle\Model\Applications;

use SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject;
use SimplyLink\AuthSDKBundle\Model\Generics\CurrenciesModel;
use SimplyLink\AuthSDKBundle\Model\Generics\PaymentGatewayModel;
use SimplyLink\AuthSDKBundle\Model\Organizations\OrganizationModel;
use JMS\Serializer\Annotation as JMS;
use SimplyLink\AuthSDKBundle\Utils\SLDateTime;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 20/08/2017
 * Time: 14:22
 */
class LicenseModel extends BaseSimplyLinkApiObject
{
    /**
     * @var boolean
     * @JMS\SerializedName("isActive")
     * @JMS\Accessor(getter="isIsActive",setter="setIsActive")
     * @JMS\Type("bool")
     */
    protected $isActive;
    
    /**
     * @var string
     * @JMS\SerializedName("externalIdentifier")
     * @JMS\Accessor(getter="getExternalIdentifier",setter="setExternalIdentifier")
     * @JMS\Type("string")
     */
    protected $externalIdentifier;
    
    /**
     * @var OrganizationModel
     * @JMS\SerializedName("organization")
     * @JMS\Accessor(getter="getOrganization",setter="setOrganization")
     * @JMS\Type("SimplyLink\AuthSDKBundle\Model\Organizations\OrganizationModel")
     */
    protected $organization;
    
    
    /**
     * @var array
     * @JMS\SerializedName("metaData")
     * @JMS\Accessor(getter="getMetaData",setter="setMetaData")
     * @JMS\Type("array")
     */
    protected $metaData;
    
    /**
     * @var ApplicationModel
     * @JMS\SerializedName("application")
     * @JMS\Accessor(getter="getApplication",setter="setApplication")
     * @JMS\Type("SimplyLink\AuthSDKBundle\Model\Applications\ApplicationModel")
     */
    protected $application;
    
    /**
     * @var ApplicationPlanInformationModel
     * @JMS\SerializedName("plan")
     * @JMS\Accessor(getter="getPlan",setter="setPlan")
     * @JMS\Type("SimplyLink\AuthSDKBundle\Model\Applications\ApplicationPlanInformationModel")
     */
    protected $plan;
    
    
    /**
     * @var float
     * @JMS\SerializedName("price")
     * @JMS\Accessor(getter="getPrice",setter="setPrice")
     * @JMS\Type("float")
     */
    protected $price;
    
    /**
     * @var CurrenciesModel
     * @JMS\SerializedName("currency")
     * @JMS\Accessor(getter="getCurrency",setter="setCurrency")
     * @JMS\Type("SimplyLink\AuthSDKBundle\Model\Generics\CurrenciesModel")
     */
    protected $currency;
    
    /**
     * @var \DateTime
     * @JMS\SerializedName("billingOn")
     * @JMS\Accessor(getter="getBillingOn",setter="setBillingOn")
     * @JMS\Type("SimplyLink\AuthSDKBundle\Utils\SLDateTime")
     */
    protected $billingOn;
    
    
    
    /**
     * @var PaymentGatewayModel
     * @JMS\SerializedName("paymentGateway")
     * @JMS\Accessor(getter="getPaymentGateway",setter="setPaymentGateway")
     * @JMS\Type("SimplyLink\AuthSDKBundle\Model\Generics\PaymentGatewayModel")
     */
    protected $paymentGateway;
    
    /**
     * @return bool
     */
    public function isIsActive()
    {
        return $this->isActive;
    }
    
    /**
     * @param bool $isActive
     * @return LicenseModel
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getExternalIdentifier()
    {
        return $this->externalIdentifier;
    }
    
    /**
     * @param string $externalIdentifier
     * @return LicenseModel
     */
    public function setExternalIdentifier($externalIdentifier)
    {
        $this->externalIdentifier = $externalIdentifier;
        return $this;
    }
    
    /**
     * @return OrganizationModel
     */
    public function getOrganization()
    {
        return $this->organization;
    }
    
    /**
     * @param OrganizationModel $organization
     * @return LicenseModel
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
        return $this;
    }
    
    /**
     * @return array
     */
    public function getMetaData()
    {
        return $this->metaData;
    }
    
    /**
     * @param array $metaData
     * @return LicenseModel
     */
    public function setMetaData($metaData)
    {
        $this->metaData = $metaData;
        return $this;
    }
    
    /**
     * @return ApplicationModel
     */
    public function getApplication()
    {
        return $this->application;
    }
    
    /**
     * @param ApplicationModel $application
     * @return LicenseModel
     */
    public function setApplication($application)
    {
        $this->application = $application;
        return $this;
    }
    
    /**
     * @return ApplicationPlanInformationModel
     */
    public function getPlan()
    {
        return $this->plan;
    }
    
    /**
     * @param ApplicationPlanInformationModel $plan
     * @return LicenseModel
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
        return $this;
    }
    
    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * @param float $price
     * @return LicenseModel
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
     * @return LicenseModel
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getBillingOn()
    {
        return $this->billingOn;
    }
    
    /**
     * @param \DateTime $billingOn
     * @return LicenseModel
     */
    public function setBillingOn($billingOn)
    {
        $this->billingOn = $billingOn;
        return $this;
    }
    
    /**
     * @return PaymentGatewayModel
     */
    public function getPaymentGateway()
    {
        return $this->paymentGateway;
    }
    
    /**
     * @param PaymentGatewayModel $paymentGateway
     * @return LicenseModel
     */
    public function setPaymentGateway($paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
        return $this;
    }
    
    
    /**
     * @return bool
     */
    public function isBasic()
    {
        return $this->getPlan()->getFeaturesPlan()->isBasic();
    }
    
    /**
     * @return bool
     */
    public function isPlus()
    {
        return $this->getPlan()->getFeaturesPlan()->isPlus();
    }
    
    /**
     * @return bool
     */
    public function isPremium()
    {
        return $this->getPlan()->getFeaturesPlan()->isPremium();
    }
    
    
}