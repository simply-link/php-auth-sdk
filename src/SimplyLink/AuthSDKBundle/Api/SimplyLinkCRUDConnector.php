<?php

namespace SimplyLink\AuthSDKBundle\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use SimplyLink\AuthSDKBundle\Model\BaseSimplyLinkApiObject;
use SimplyLink\AuthSDKBundle\Model\SLoAuthAccessToken;
use SimplyLink\AuthSDKBundle\Utils\SLApiExclusionStrategy;
use SimplyLink\UtilsBundle\Utils\GenericDataManager;
use SimplyLink\UtilsBundle\Utils\SLBaseUtils;
use SimplyLink\UtilsBundle\Utils\SLResponseManager;

abstract class SimplyLinkCRUDConnector extends SimplyLinkReadOnlyConnector
{
    
    /**
     * @param BaseSimplyLinkApiObject $record
     * @return BaseSimplyLinkApiObject|array
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function createRecord(BaseSimplyLinkApiObject $record)
    {
        SLBaseUtils::getLogger()->info('Create record started for object ' . get_class($record));
    
        $exclusionStrategy = $this->setExclusionStrategyForAction(self::SL_API_ACTION_CREATE);
        if(!$exclusionStrategy)
            $exclusionStrategy = [];
    
        $exclusionStrategy[] = new SLApiExclusionStrategy(["id"]);
        
        $json = SLResponseManager::serialize($record,$exclusionStrategy);
        $body = json_decode($json,true);
        
        $options = ['json' => $body];
        $additionalOptions = $this->setRequestOptions(self::SL_API_ACTION_CREATE);
        if(!$additionalOptions)
        {
            $options = array_merge($options,$additionalOptions);
        }
        
        
        $uri = $this->setApiPath();
        $response = $this->client->request('POST',$uri,$options);
        
        return $this->parseResponse($response, $this->getApiObjectModel());
        
    }
    
    /**
     * @param BaseSimplyLinkApiObject $record
     * @return array|BaseSimplyLinkApiObject
     * @throws \SimplyLink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function updateRecord(BaseSimplyLinkApiObject $record)
    {
        SLBaseUtils::getLogger()->info('Update record started for object ' . get_class($record));
    
        $exclusionStrategy = $this->setExclusionStrategyForAction(self::SL_API_ACTION_UPDATE);
        if(!$exclusionStrategy)
            $exclusionStrategy = [];
    
        $exclusionStrategy[] = new SLApiExclusionStrategy(["id"]);
    
        $json = SLResponseManager::serialize($record,$exclusionStrategy);
        
        $body = json_decode($json,true);
        $options = [ 'json' => $body ];
        
        $additionalOptions = $this->setRequestOptions(self::SL_API_ACTION_UPDATE);
        if(!$additionalOptions)
        {
            $options = array_merge($options,$additionalOptions);
        }
        
        $uri = $this->setApiPath() . '/' . $record->getId();
        $response = $this->client->request('PATCH',$uri,$options);
        
        return $this->parseResponse($response, $this->getApiObjectModel());
    }
    
    
    
}
