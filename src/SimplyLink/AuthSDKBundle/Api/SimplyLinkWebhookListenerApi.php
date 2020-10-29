<?php


namespace SimplyLink\AuthSDKBundle\Api;


use SimplyLink\AuthSDKBundle\Model\Webhook\WebhookListenerModel;
use SimplyLink\AuthSDKBundle\Utils\SLApiExclusionStrategy;

class SimplyLinkWebhookListenerApi extends SimplyLinkCRUDConnector
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
    public static function getSimplyLinkRequiredScope()
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