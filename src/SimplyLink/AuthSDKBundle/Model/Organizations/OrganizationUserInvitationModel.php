<?php

namespace SimplyLink\AuthSDKBundle\Model\Organizations;

use SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject;
use JMS\Serializer\Annotation as JMS;

class OrganizationUserInvitationModel extends BaseSimplyLinkApiObject
{
    
    /**
     * @var string
     */
    protected $invitationUniqueIdentifier;
    
    /**
     * @var string
     */
    protected $name;
    
    /**
     * @var string
     */
    protected $email;
    
    /**
     * @var \DateTime
     */
    protected $created;
    
    /**
     * @var \DateTime
     */
    protected $updated;
    
    /**
     * @return string
     */
    public function getInvitationUniqueIdentifier()
    {
        return $this->invitationUniqueIdentifier;
    }
    
    /**
     * @param string $invitationUniqueIdentifier
     * @return OrganizationUserInvitationModel
     */
    public function setInvitationUniqueIdentifier($invitationUniqueIdentifier)
    {
        $this->invitationUniqueIdentifier = $invitationUniqueIdentifier;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     * @return OrganizationUserInvitationModel
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return OrganizationUserInvitationModel
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
    
    /**
     * @param \DateTime $created
     * @return OrganizationUserInvitationModel
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
    
    /**
     * @param \DateTime $updated
     * @return OrganizationUserInvitationModel
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }
    
    
    
    
    
}