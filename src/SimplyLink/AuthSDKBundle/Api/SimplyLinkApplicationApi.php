<?php


namespace SimplyLink\AuthSDKBundle\Api;


use SimplyLink\AuthSDKBundle\Model\Applications\ApplicationModel;

class SimplyLinkApplicationApi extends SimplyLinkReadOnlyConnector
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
    public static function getSimplyLinkRequiredScope()
    {
        return [
            'auth.apps'
        ];
    }
    
    /**
     * Get the current Application, detect by the access token
     *
     * @return \SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject|\SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject[]|null
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getSelfApp()
    {
        $uri = $this->setApiPath() . '/me';
        $response = $this->client->request('GET',$uri);
        return $this->parseResponse($response,$this->getApiObjectModel());
    }
    
    
    

}