<?php

namespace Simplylink\AuthSDKBundle\Model\Users;

use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use Simplylink\AuthSDKBundle\Model\Generics\LanguagesModel;
use JMS\Serializer\Annotation as JMS;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 20/08/2017
 * Time: 14:22
 */
class UserModel extends BaseSimplylinkApiObject
{
    
    /**
     * @var string
     * @JMS\SerializedName("firstName")
     * @JMS\Accessor(getter="getFirstName",setter="setFirstName")
     * @JMS\Type("string")
     */
    protected $firstName;
    
    /**
     * @var string
     * @JMS\SerializedName("lastName")
     * @JMS\Accessor(getter="getLastName",setter="setLastName")
     * @JMS\Type("string")
     */
    protected $lastName;
    
    /**
     * @var string
     * @JMS\SerializedName("email")
     * @JMS\Accessor(getter="getEmail",setter="setEmail")
     * @JMS\Type("string")
     */
    protected $email;
    
    /**
     * @var string
     * @JMS\SerializedName("phone")
     * @JMS\Accessor(getter="getPhone",setter="setPhone")
     * @JMS\Type("string")
     */
    protected $phone;
    
    /**
     * @var LanguagesModel
     * @JMS\Exclude()
     */
    protected $language;
    
    /**
     * @var string
     * @JMS\Exclude()
     */
    protected $profilePic;
    
    /**
     * @var string
     * @JMS\SerializedName("plainPassword")
     * @JMS\Accessor(getter="getPlainPassword",setter="setPlainPassword")
     * @JMS\Type("string")
     */
    protected $plainPassword;

    
    /**
     * @var UserOrganizationModel[]
     * @JMS\SerializedName("organizations")
     * @JMS\Accessor(getter="getOrganizations",setter="setOrganizations")
     * @JMS\Type("array<Simplylink\AuthSDKBundle\Model\Users\UserOrganizationModel>")
     */
    protected $organizations = [];
    
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * @param string $firstName
     * @return UserModel
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * @param string $lastName
     * @return UserModel
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param string $email
     * @return UserModel
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @return UserModel
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    
    /**
     * @return LanguagesModel
     */
    public function getLanguage()
    {
        return $this->language;
    }
    
    /**
     * @param LanguagesModel $language
     * @return UserModel
     */
    public function setLanguage($language)
    {
        $this->language = $language;
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
     * @return UserModel
     */
    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;
        return $this;
    }
    
    /**
     * @return UserOrganizationModel[]
     */
    public function getOrganizations()
    {
        return $this->organizations;
    }
    
    /**
     * @param UserOrganizationModel[] $organizations
     * @return UserModel
     */
    public function setOrganizations($organizations)
    {
        $this->organizations = $organizations;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
    
    /**
     * @param mixed $plainPassword
     * @return UserModel
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }
    
    
    
    
    
    
}