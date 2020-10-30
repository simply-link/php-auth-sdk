<?php


namespace Simplylink\AuthSDKBundle\Api;


use Simplylink\AuthSDKBundle\Model\Users\UserModel;
use Simplylink\AuthSDKBundle\Utils\SLApiExclusionStrategy;

class SimplylinkUsersApi extends SimplylinkCRUDConnector
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
    public static function getSimplylinkRequiredScope()
    {
        return [
            'auth.user',
            'auth.user.list',
            'auth.user.create'
        ];
    }
    
    
    /**
     * @return array | \Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject | UserModel
     * @throws \Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
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