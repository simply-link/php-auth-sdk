<?php


namespace SimplyLink\AuthSDKBundle\Api;


use SimplyLink\AuthSDKBundle\Model\Users\LoginTokenModel;
use SimplyLink\AuthSDKBundle\Utils\SLApiExclusionStrategy;

class SimplyLinkLoginTokensApi extends SimplyLinkCRUDConnector
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
    public static function getSimplyLinkRequiredScope()
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