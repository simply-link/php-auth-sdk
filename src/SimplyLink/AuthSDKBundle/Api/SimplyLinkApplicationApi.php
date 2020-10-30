<?php


namespace Simplylink\AuthSDKBundle\Api;


use Simplylink\AuthSDKBundle\Model\Applications\ApplicationModel;

class SimplylinkApplicationApi extends SimplylinkReadOnlyConnector
{
    
    
    
    protected function setApiPath()
    {
        return 'https://auth.' . self::getDomainForEnvironment() . '/api/apps';
    }
    
    public function getApiObjectModel()
    {
        return new ApplicationModel();
    }
    
    /**
     * @inheritDoc
     */
    public static function getSimplylinkRequiredScope()
    {
        return [
            'auth.apps'
        ];
    }
    
    /**
     * Get the current Application, detect by the access token
     *
     * @return \Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject|\Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject[]|null
     * @throws \Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getSelfApp()
    {
        $uri = $this->setApiPath() . '/me';
        $response = $this->client->request('GET',$uri);
        return $this->parseResponse($response,$this->getApiObjectModel());
    }
    
    
    

}