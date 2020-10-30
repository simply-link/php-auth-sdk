<?php
/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 26/10/2017
 * Time: 15:56
 */

namespace Simplylink\AuthSDKBundle\Handlers;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\Context;
use Simplylink\AuthSDKBundle\Model\Generics\CurrenciesModel;
use Simplylink\AuthSDKBundle\Model\Organizations\OrganizationRolesModel;

class OrganizationRolesSerializer implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => OrganizationRolesModel::class,
                'method' => 'serializeObj',
            ),
        );
    }
    
    public function serializeObj(JsonSerializationVisitor $visitor, OrganizationRolesModel $obj, array $type, Context $context)
    {
        return $obj->getId();
    }
    
    
    
}