<?php


namespace Simplylink\AuthSDKBundle\Api;


use Simplylink\AuthSDKBundle\Model\Users\LoginTokenModel;
use Simplylink\AuthSDKBundle\Utils\SLApiExclusionStrategy;

class SimplylinkLoginTokensApi extends SimplylinkCRUDConnector
{
    protected function setApiPath()
    {
        return 'https://auth.' . self::getDomainForEnvironment() . '/api/loginToken';
    }
    
    public function getApiObjectModel()
    {
        return new LoginTokenModel();
    }
    
    /**
     * @inheritDoc
     */
    public static function getSimplylinkRequiredScope()
    {
        return [
            'auth.login-token'
        ];
    }
    
    
    protected function setExclusionStrategyForAction($action)
    {
        if($action == self::SL_API_ACTION_CREATE)
        {
            return [
                new SLApiExclusionStrategy(["expired","loginToken"])
            ];
        }
        
        return parent::setExclusionStrategyForAction($action);
    }
    
    
}