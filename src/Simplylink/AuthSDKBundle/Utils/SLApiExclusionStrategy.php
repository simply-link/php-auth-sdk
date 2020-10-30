<?php
/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 03/10/2017
 * Time: 16:35
 */

namespace Simplylink\AuthSDKBundle\Utils;


use JMS\Serializer\Exclusion\ExclusionStrategyInterface;
use JMS\Serializer\Metadata\ClassMetadata;
use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Context;


/**
 * Class SLApiExclusionStrategy
 *
 */
class SLApiExclusionStrategy implements ExclusionStrategyInterface
{
    private $fields = array();
    
    /**
     * SLApiExclusionStrategy constructor.
     *
     * @param array $fields Pass in this variable all the fields you want to exclude
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }
    
    /**
     * {@inheritDoc}
     */
    public function shouldSkipClass(ClassMetadata $metadata, Context $navigatorContext)
    {
        return false;
    }
    
    /**
     * {@inheritDoc}
     */
    public function shouldSkipProperty(PropertyMetadata $property, Context $navigatorContext)
    {
        if (empty($this->fields)) {
            return false;
        }
        
        $name = $property->serializedName ?: $property->name;
        
        return in_array($name, $this->fields);
    }
}