<?php


namespace SimplyLink\AuthSDKBundle\Api;


use SimplyLink\AuthSDKBundle\Model\Users\UserModel;
use SimplyLink\AuthSDKBundle\Utils\SLApiExclusionStrategy;

class SimplyLinkUsersApi extends SimplyLinkCRUDConnector
{
    protected function setApiPath()
    {
        return 'https://auth.' . self::getDomainForEnvironment() . '/api/user';
    }
    
    public function getApiObjectModel()
    {
        return new UserModel();
    }
    
    /**
     * @inheritDoc
     */
    public static function getSimplyLinkRequiredScope()
    {
        return [
            'auth.user',
            'auth.user.list',
            'auth.user.create'
        ];
    }
    
    
    /**
     * @return array | \SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject | UserModel
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getSelfUser()
    {
        $uri = $this->setApiPath() . '/me';
        $response = $this->client->request('GET',$uri);
        return $this->parseResponse($response, $this->getApiObjectModel());
    }
    
    
    protected function setExclusionStrategyForAction($action)
    {
        if($action == self::SL_API_ACTION_CREATE || $action == self::SL_API_ACTION_UPDATE)
        {
            return [
                new SLApiExclusionStrategy(["organizations"])
            ];
        }
        
        return parent::setExclusionStrategyForAction($action);
    }
    
    
}