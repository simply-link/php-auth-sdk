<?php


namespace SimplyLink\AuthSDKBundle\Api;


use SimplyLink\AuthSDKBundle\Model\Organizations\OrganizationModel;
use SimplyLink\AuthSDKBundle\Utils\SLApiExclusionStrategy;


class SimplyLinkOrganizationsApi extends SimplyLinkCRUDConnector
{
    protected function setApiPath()
    {
        return 'https://auth.' . self::getDomainForEnvironment() . '/api/organization';
    }
    
    public function getApiObjectModel()
    {
        return new OrganizationModel();
    }
    
    /**
     * @inheritDoc
     */
    public static function getSimplyLinkRequiredScope()
    {
        return [
            'auth.organization',
            'auth.organization.list'
        ];
    }
    
    protected function setExclusionStrategyForAction($action)
    {
        if($action == self::SL_API_ACTION_CREATE || $action == self::SL_API_ACTION_UPDATE)
        {
            return [
              new SLApiExclusionStrategy(['users'])
            ];
        }
        
        
        return parent::setExclusionStrategyForAction($action);
    }
    
    
}