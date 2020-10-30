<?php

namespace Simplylink\AuthSDKBundle\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use Simplylink\AuthSDKBundle\Model\SLoAuthAccessToken;
use Simplylink\AuthSDKBundle\Utils\SLApiExclusionStrategy;
use Simplylink\UtilsBundle\Utils\GenericDataManager;
use Simplylink\UtilsBundle\Utils\SLBaseUtils;
use Simplylink\UtilsBundle\Utils\SLResponseManager;

abstract class SimplylinkCRUDConnector extends SimplylinkReadOnlyConnector
{
    
    /**
     * @param BaseSimplylinkApiObject $record
     * @return BaseSimplylinkApiObject|array
     * @throws \Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function createRecord(BaseSimplylinkApiObject $record)
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
     * @param BaseSimplylinkApiObject $record
     * @return array|BaseSimplylinkApiObject
     * @throws \Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function updateRecord(BaseSimplylinkApiObject $record)
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
