<?php


namespace SimplyLink\AuthSDKBundle\Api;


use SimplyLink\AuthSDKBundle\Model\Applications\ApplicationPlanInformationModel;
use SimplyLink\AuthSDKBundle\Model\Applications\FeaturesPlanModel;
use SimplyLink\AuthSDKBundle\Model\SLoAuthAccessToken;

use SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionUnexpectedValue;
use SimplyLink\UtilsBundle\Utils\GenericDataManager;

class SimplyLinkApplicationPlanInformationApi extends SimplyLinkReadOnlyConnector
{
    
    /**
     * @var integer
     */
    private $appId;
    
    
    /**
     * SimplyLinkApplicationPlanInformationApi constructor.
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
    public static function getSimplyLinkRequiredScope()
    {
        return [
            'auth.apps'
        ];
    }
    
    
    /**
     * @return null|mixed|ApplicationPlanInformationModel
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getBasicPlan()
    {
        $results = $this->getRecordsList(["featuresPlan" => FeaturesPlanModel::FEATURE_PLAN_BASIC]);
        return GenericDataManager::getFirstElementOfArray($results,null);
    }
    
    
}