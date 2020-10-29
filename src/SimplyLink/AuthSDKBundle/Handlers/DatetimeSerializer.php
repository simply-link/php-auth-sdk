<?php
/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 26/10/2017
 * Time: 15:56
 */

namespace SimplyLink\AuthSDKBundle\Handlers;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\Context;
use SimplyLink\AuthSDKBundle\Model\Generics\CurrenciesModel;
use SimplyLink\AuthSDKBundle\Utils\SLDateTime;

class DatetimeSerializer implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => SLDateTime::class,
                'method' => 'serializeObj',
            ),
            
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => SLDateTime::class,
                'method' => 'deserializeObj',
            ),
        );
    }
    
    public function serializeObj(JsonSerializationVisitor $visitor, \DateTime $obj, array $type, Context $context)
    {
        return $obj->format(\DateTime::ISO8601);
    }
    
    public function deserializeObj(JsonDeserializationVisitor $visitor, $obj, array $type, Context $context)
    {
        if($obj && is_string($obj))
        {
            return SLDateTime::createFromFormat(\DateTime::ISO8601,$obj);
        }
        return null;
    }
    
    
    
}