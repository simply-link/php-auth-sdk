<?php


namespace Simplylink\AuthSDKBundle\Api;


use Simplylink\AuthSDKBundle\Model\Applications\LicenseModel;
use Simplylink\AuthSDKBundle\Model\SLoAuthAccessToken;
use Simplylink\AuthSDKBundle\Model\Users\UserModel;
use Simplylink\AuthSDKBundle\Utils\SLApiExclusionStrategy;
use Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionUnexpectedValue;

class SimplylinkLicenseApi extends SimplylinkCRUDConnector
{
    /**
     * @var int
     */
    private $organizationId;
    
    
    /**
     * SimplylinkLicenseApi constructor.
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
    public static function getSimplylinkRequiredScope()
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
     * @return \Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject|\Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject[]|null|LicenseModel
     * @throws \Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function validateLicense()
    {
        $uri = $this->setApiPath() . '/validate';
        $response = $this->client->request('GET',$uri);
        return $this->parseResponse($response, $this->getApiObjectModel());
    }
    
}