<?php


namespace Simplylink\AuthSDKBundle\Api;


use GuzzleHttp\RequestOptions;
use Simplylink\AuthSDKBundle\Model\Webhook\WebhookEventModel;
use Simplylink\AuthSDKBundle\Utils\SLApiExclusionStrategy;

class SimplylinkWebhookEventApi extends SimplylinkCRUDConnector
{
    protected function setApiPath()
    {
        return 'https://webhook.' . self::getDomainForEnvironment() . '/api/event';
    }
    
    public function getApiObjectModel()
    {
        return new WebhookEventModel();
    }
    
    /**
     * @inheritDoc
     */
    public static function getSimplylinkRequiredScope()
    {
        return [
            'webhook.event'
        ];
    }
    
    protected function setExclusionStrategyForAction($action)
    {
        if($action == self::SL_API_ACTION_UPDATE || $action == self::SL_API_ACTION_CREATE)
        {
            return [
                new SLApiExclusionStrategy(["creatorClientId","createdAt"])
            ];
        }
        
        return null;
    }
    
    protected function setRequestOptions($action)
    {
        if($action == self::SL_API_ACTION_CREATE)
        {
            return [
                RequestOptions::SYNCHRONOUS => false
            ];
        }
        return [];
    }
    
    
}