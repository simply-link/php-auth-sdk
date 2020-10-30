<?php

namespace Simplylink\AuthSDKBundle\Model\Organizations;

use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use Simplylink\AuthSDKBundle\Model\Generics\CountriesModel;
use JMS\Serializer\Annotation as JMS;


class OrganizationModel extends BaseSimplylinkApiObject
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
     * @JMS\SerializedName("profilePic")
     * @JMS\Accessor(getter="getProfilePic",setter="setProfilePic")
     * @JMS\Type("string")
     */
    protected $profilePic;
    
    
    /**
     * @var string
     * @JMS\SerializedName("legalEntityName")
     * @JMS\Accessor(getter="getLegalEntityName",setter="setLegalEntityName")
     * @JMS\Type("string")
     */
    protected $legalEntityName;
    
    /**
     * @var string
     * @JMS\SerializedName("taxId")
     * @JMS\Accessor(getter="getTaxId",setter="setTaxId")
     * @JMS\Type("string")
     */
    protected $taxId;
    
    /**
     * @var string
     * @JMS\SerializedName("website")
     * @JMS\Accessor(getter="getWebsite",setter="setWebsite")
     * @JMS\Type("string")
     */
    protected $website;
    
    /**
     * @var string
     * @JMS\SerializedName("phone")
     * @JMS\Accessor(getter="getPhone",setter="setPhone")
     * @JMS\Type("string")
     */
    protected $phone;
    
    /**
     * @var string
     * @JMS\SerializedName("billingEmail")
     * @JMS\Accessor(getter="getBillingEmail",setter="setBillingEmail")
     * @JMS\Type("string")
     */
    protected $billingEmail;
    
    
    /**
     * @var string
     * @JMS\SerializedName("shopifyDomain")
     * @JMS\Accessor(getter="getShopifyDomain",setter="setShopifyDomain")
     * @JMS\Type("string")
     */
    protected $shopifyDomain;
    
    /**
     * @var int
     * @JMS\SerializedName("shopifyShopId")
     * @JMS\Accessor(getter="getShopifyShopId",setter="setShopifyShopId")
     * @JMS\Type("int")
     */
    protected $shopifyShopId;

    
    /**
     * @var string
     * @JMS\SerializedName("addressStreet")
     * @JMS\Accessor(getter="getAddressStreet",setter="setAddressStreet")
     * @JMS\Type("string")
     */
    protected $addressStreet;
    
    /**
     * @var string
     * @JMS\SerializedName("addressCity")
     * @JMS\Accessor(getter="getAddressCity",setter="setAddressCity")
     * @JMS\Type("string")
     */
    protected $addressCity;
    
    /**
     * @var string
     * @JMS\SerializedName("addressZipCode")
     * @JMS\Accessor(getter="getAddressZipCode",setter="setAddressZipCode")
     * @JMS\Type("string")
     */
    protected $addressZipCode;
    
    /**
     * @var CountriesModel
     * @JMS\SerializedName("addressCountry")
     * @JMS\Accessor(getter="getAddressCountry",setter="setAddressCountry")
     * @JMS\Type("Simplylink\AuthSDKBundle\Model\Generics\CountriesModel")
     */
    protected $addressCountry;
    
    /**
     * @var OrganizationUsersModel[]
     * @JMS\SerializedName("users")
     * @JMS\Accessor(getter="getUsers",setter="setUsers")
     * @JMS\Type("array<Simplylink\AuthSDKBundle\Model\Organizations\OrganizationUsersModel>")
     */
    protected $users;
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     * @return OrganizationModel
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProfilePic()
    {
        return $this->profilePic;
    }
    
    /**
     * @param string $profilePic
     * @return OrganizationModel
     */
    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLegalEntityName()
    {
        return $this->legalEntityName;
    }
    
    /**
     * @param string $legalEntityName
     * @return OrganizationModel
     */
    public function setLegalEntityName($legalEntityName)
    {
        $this->legalEntityName = $legalEntityName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTaxId()
    {
        return $this->taxId;
    }
    
    /**
     * @param string $taxId
     * @return OrganizationModel
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }
    
    /**
     * @param string $website
     * @return OrganizationModel
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
    
    /**
     * @param string $phone
     * @return OrganizationModel
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBillingEmail()
    {
        return $this->billingEmail;
    }
    
    /**
     * @param string $billingEmail
     * @return OrganizationModel
     */
    public function setBillingEmail($billingEmail)
    {
        $this->billingEmail = $billingEmail;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShopifyDomain()
    {
        return $this->shopifyDomain;
    }
    
    /**
     * @param string $shopifyDomain
     * @return OrganizationModel
     */
    public function setShopifyDomain($shopifyDomain)
    {
        $this->shopifyDomain = $shopifyDomain;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getShopifyShopId()
    {
        return $this->shopifyShopId;
    }
    
    /**
     * @param int $shopifyShopId
     * @return OrganizationModel
     */
    public function setShopifyShopId($shopifyShopId)
    {
        $this->shopifyShopId = $shopifyShopId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAddressStreet()
    {
        return $this->addressStreet;
    }
    
    /**
     * @param string $addressStreet
     * @return OrganizationModel
     */
    public function setAddressStreet($addressStreet)
    {
        $this->addressStreet = $addressStreet;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAddressCity()
    {
        return $this->addressCity;
    }
    
    /**
     * @param string $addressCity
     * @return OrganizationModel
     */
    public function setAddressCity($addressCity)
    {
        $this->addressCity = $addressCity;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAddressZipCode()
    {
        return $this->addressZipCode;
    }
    
    /**
     * @param string $addressZipCode
     * @return OrganizationModel
     */
    public function setAddressZipCode($addressZipCode)
    {
        $this->addressZipCode = $addressZipCode;
        return $this;
    }
    
    /**
     * @return CountriesModel
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }
    
    /**
     * @param CountriesModel $addressCountry
     * @return OrganizationModel
     */
    public function setAddressCountry($addressCountry)
    {
        $this->addressCountry = $addressCountry;
        return $this;
    }
    
    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }
    
    /**
     * @param array $users
     * @return OrganizationModel
     */
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }
    
    
    
    
    
}