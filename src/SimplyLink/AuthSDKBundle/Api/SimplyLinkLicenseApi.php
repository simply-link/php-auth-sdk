<?php


namespace SimplyLink\AuthSDKBundle\Api;


use SimplyLink\AuthSDKBundle\Model\Applications\LicenseModel;
use SimplyLink\AuthSDKBundle\Model\SLoAuthAccessToken;
use SimplyLink\AuthSDKBundle\Model\Users\UserModel;
use SimplyLink\AuthSDKBundle\Utils\SLApiExclusionStrategy;
use SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionUnexpectedValue;

class SimplyLinkLicenseApi extends SimplyLinkCRUDConnector
{
    /**
     * @var int
     */
    private $organizationId;
    
    
    /**
     * SimplyLinkLicenseApi constructor.
     *
     * @param int $organizationId
     * @param SLoAuthAccessToken $token
     * @throws SLExceptionUnexpectedValue
     */
    public function __construct($organizationId,SLoAuthAccessToken $token)
    {
        parent::__construct($token);
        
        if(!$organizationId || !intval($organizationId))
            throw SLExceptionUnexpectedValue::expectedPositiveNumber('$organizationId',$organizationId);
        
        $this->organizationId = $organizationId;
    }
    
    
    
    protected function setApiPath()
    {
        return 'https://auth.' . self::getDomainForEnvironment() . '/api/organization/' . $this->organizationId . '/license';
    }
    
    public function getApiObjectModel()
    {
        return new LicenseModel();
    }
    
    /**
     * @inheritDoc
     */
    public static function getSimplyLinkRequiredScope()
    {
        return [
            'auth.license'
        ];
    }
    
    protected function setExclusionStrategyForAction($action)
    {
        if($action == self::SL_API_ACTION_CREATE || $action == self::SL_API_ACTION_UPDATE)
        {
            return [
                new SLApiExclusionStrategy(['organization','application'])
            ];
        }
        return [];
    }
    
    
    /**
     * @return \SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject|\SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject[]|null|LicenseModel
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function validateLicense()
    {
        $uri = $this->setApiPath() . '/validate';
        $response = $this->client->request('GET',$uri);
        return $this->parseResponse($response, $this->getApiObjectModel());
    }
    
}