<?php


namespace Simplylink\AuthSDKBundle\Api;


use Simplylink\AuthSDKBundle\Model\Applications\ApplicationPlanInformationModel;
use Simplylink\AuthSDKBundle\Model\Applications\FeaturesPlanModel;
use Simplylink\AuthSDKBundle\Model\SLoAuthAccessToken;

use Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionUnexpectedValue;
use Simplylink\UtilsBundle\Utils\GenericDataManager;

class SimplylinkApplicationPlanInformationApi extends SimplylinkReadOnlyConnector
{
    
    /**
     * @var integer
     */
    private $appId;
    
    
    /**
     * SimplylinkApplicationPlanInformationApi constructor.
     *
     * @param integer $appId
     * @param SLoAuthAccessToken $token
     * @throws SLExceptionUnexpectedValue
     */
    public function __construct($appId,SLoAuthAccessToken $token)
    {
        parent::__construct($token);
        
        if(!$appId || !is_int($appId))
            throw SLExceptionUnexpectedValue::expectedPositiveNumber('$appId',$appId);
        
        $this->appId = $appId;
    }
    
    
    protected function setApiPath()
    {
        return 'https://auth.' . self::getDomainForEnvironment() . '/api/apps/' . $this->appId . '/plans' ;
    }
    
    public function getApiObjectModel()
    {
        return new ApplicationPlanInformationModel();
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
     * @return null|mixed|ApplicationPlanInformationModel
     * @throws \Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getBasicPlan()
    {
        $results = $this->getRecordsList(["featuresPlan" => FeaturesPlanModel::FEATURE_PLAN_BASIC]);
        return GenericDataManager::getFirstElementOfArray($results,null);
    }
    
    
}