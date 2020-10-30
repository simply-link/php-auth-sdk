<?php

namespace Simplylink\AuthSDKBundle\Api;


interface SimplylinkConnectorTemplate
{
    
    /**
     * @return array|null
     */
    public static function getSimplylinkRequiredScope();
    
}
