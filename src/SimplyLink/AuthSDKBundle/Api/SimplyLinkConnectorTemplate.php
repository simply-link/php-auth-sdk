<?php

namespace SimplyLink\AuthSDKBundle\Api;


interface SimplyLinkConnectorTemplate
{
    
    /**
     * @return array|null
     */
    public static function getSimplyLinkRequiredScope();
    
}
