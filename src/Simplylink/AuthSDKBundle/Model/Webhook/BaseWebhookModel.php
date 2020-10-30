<?php

namespace Simplylink\AuthSDKBundle\Model\Webhook;

use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use JMS\Serializer\Annotation as JMS;

/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 20/09/2017
 * Time: 15:07
 */
class BaseWebhookModel extends BaseSimplylinkApiObject
{
    const WEBHOOK_ACTION_CREATE = 'CREATE';
    const WEBHOOK_ACTION_UPDATE = 'UPDATE';
    const WEBHOOK_ACTION_DELETE = 'DELETE';
    
}