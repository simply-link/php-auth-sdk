<?php


namespace Simplylink\AuthSDKBundle\Api;


use Simplylink\AuthSDKBundle\Model\Webhook\WebhookListenerModel;
use Simplylink\AuthSDKBundle\Utils\SLApiExclusionStrategy;

class SimplylinkWebhookListenerApi extends SimplylinkCRUDConnector
{
    protected function setApiPath()
    {
        return 'https://webhook.' . self::getDomainForEnvironment() . '/api/listener';
    }
    
    public function getApiObjectModel()
    {
        return new WebhookListenerModel();
    }
    
    /**
     * @inheritDoc
     */
    public static function getSimplylinkRequiredScope()
    {
        return [
            'webhook.listener'
        ];
    }
    
    
    
    protected function setExclusionStrategyForAction($action)
    {
        if($action == self::SL_API_ACTION_UPDATE || $action == self::SL_API_ACTION_CREATE)
        {
            return [
                new SLApiExclusionStrategy(["ownerClientId","createdAt"])
            ];
        }
        
        return null;
    }

}