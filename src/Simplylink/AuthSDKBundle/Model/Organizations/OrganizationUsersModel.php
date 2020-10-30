<?php

namespace Simplylink\AuthSDKBundle\Model\Organizations;

use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use JMS\Serializer\Annotation as JMS;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 20/08/2017
 * Time: 14:22
 */
class OrganizationUsersModel extends BaseSimplylinkApiObject
{
    const ROLE_ADMIN = 20;
    const ROLE_USER = 30;
    
    
    /**
     * @var int
     * @JMS\SerializedName("userId")
     * @JMS\Accessor(getter="getUserId",setter="setUserId")
     * @JMS\Type("int")
     */
    protected $userId;
    
    /**
     * @var string
     * @JMS\SerializedName("firstName")
     * @JMS\Accessor(getter="getFirstName",setter="getLastName")
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
     * @JMS\SerializedName("profilePic")
     * @JMS\Accessor(getter="getProfilePic",setter="setProfilePic")
     * @JMS\Type("string")
     */
    protected $profilePic;
    
    /**
     * @var OrganizationRolesModel
     * @JMS\SerializedName("role")
     * @JMS\Accessor(getter="getRole",setter="setRole")
     * @JMS\Type("Simplylink\AuthSDKBundle\Model\Organizations\OrganizationRolesModel")
     */
    protected $role;
    
    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }
    
    /**
     * @param int $userId
     * @return OrganizationUsersModel
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * @param string $firstName
     * @return OrganizationUsersModel
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
     * @return OrganizationUsersModel
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
     * @return OrganizationUsersModel
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @return OrganizationUsersModel
     */
    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;
        return $this;
    }
    
    /**
     * @return OrganizationRolesModel
     */
    public function getRole()
    {
        return $this->role;
    }
    
    /**
     * @param OrganizationRolesModel $role
     * @return OrganizationUsersModel
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
    
    
    
    
}