<?php

namespace Simplylink\AuthSDKBundle\Model\Applications;

use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use JMS\Serializer\Annotation as JMS;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 20/08/2017
 * Time: 14:22
 */
class ApplicationModel extends BaseSimplylinkApiObject
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
     * @JMS\SerializedName("icon")
     * @JMS\Accessor(getter="getIcon",setter="setIcon")
     * @JMS\Type("string")
     */
    protected $icon;
    
    /**
     * @var string
     * @JMS\SerializedName("website")
     * @JMS\Accessor(getter="getWebsite",setter="setWebsite")
     * @JMS\Type("string")
     */
    protected $website;
    
    /**
     * @var string
     * @JMS\SerializedName("shortDescription")
     * @JMS\Accessor(getter="getShortDescription",setter="setShortDescription")
     * @JMS\Type("string")
     */
    protected $shortDescription;
    
    /**
     * @var string
     * @JMS\SerializedName("fullDescription")
     * @JMS\Accessor(getter="getFullDescription",setter="setFullDescription")
     * @JMS\Type("string")
     */
    protected $fullDescription;
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     * @return ApplicationModel
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }
    
    /**
     * @param string $icon
     * @return ApplicationModel
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
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
     * @return ApplicationModel
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }
    
    /**
     * @param string $shortDescription
     * @return ApplicationModel
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFullDescription()
    {
        return $this->fullDescription;
    }
    
    /**
     * @param string $fullDescription
     * @return ApplicationModel
     */
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;
        return $this;
    }
    
    
    
    
}