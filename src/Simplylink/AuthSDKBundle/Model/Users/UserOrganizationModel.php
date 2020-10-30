<?php

namespace Simplylink\AuthSDKBundle\Model\Users;

use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use Simplylink\AuthSDKBundle\Model\Organizations\OrganizationModel;
use Simplylink\AuthSDKBundle\Model\Organizations\OrganizationRolesModel;
use JMS\Serializer\Annotation as JMS;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 20/08/2017
 * Time: 14:22
 */
class UserOrganizationModel extends BaseSimplylinkApiObject
{
    
    /**
     * @var OrganizationRolesModel
     * @JMS\SerializedName("role")
     * @JMS\Accessor(getter="getRole",setter="setRole")
     * @JMS\Type("Simplylink\AuthSDKBundle\Model\Organizations\OrganizationRolesModel")
     */
    protected $role;
    
    /**
     * @var OrganizationModel
     * @JMS\SerializedName("organization")
     * @JMS\Accessor(getter="getOrganization",setter="setOrganization")
     * @JMS\Type("Simplylink\AuthSDKBundle\Model\Organizations\OrganizationModel")
     */
    protected $organization;
    
    /**
     * @return OrganizationRolesModel
     */
    public function getRole()
    {
        return $this->role;
    }
    
    /**
     * @param OrganizationRolesModel $role
     * @return UserOrganizationModel
     */
    public function setRole($role)
    {
        $this->role = $role;
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
     * @return UserOrganizationModel
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
        return $this;
    }
    
    
    
}