<?php


namespace Simplylink\AuthSDKBundle\Api;


use Simplylink\AuthSDKBundle\Model\Organizations\OrganizationModel;
use Simplylink\AuthSDKBundle\Utils\SLApiExclusionStrategy;


class SimplylinkOrganizationsApi extends SimplylinkCRUDConnector
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
    public static function getSimplylinkRequiredScope()
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