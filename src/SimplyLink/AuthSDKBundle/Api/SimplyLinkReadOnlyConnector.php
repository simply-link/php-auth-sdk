<?php

namespace Simplylink\AuthSDKBundle\Api;

use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use Simplylink\UtilsBundle\Utils\SLBaseUtils;


abstract class SimplylinkReadOnlyConnector extends BaseSimplylinkConnector
{
    
    
    /**
     * @param int $recordId
     * @return BaseSimplylinkApiObject|BaseSimplylinkApiObject[]|null|mixed
     * @throws \Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getSingleRecord($recordId)
    {
        $uri = $this->setApiPath() . '/' . $recordId;
        SLBaseUtils::getLogger()->info('Get single record started for record_id' . $recordId,['url' =>  $uri]);
    
        $options = [];
    
        $additionalOptions = $this->setRequestOptions(self::SL_API_ACTION_READ);
        if(!$additionalOptions)
        {
            $options = array_merge($options,$additionalOptions);
        }
        
        
        $response = $this->client->request('GET',$uri,$options);
        
        return $this->parseResponse($response, $this->getApiObjectModel());
    }
    
    
    /**
     * @param array|null $params
     * @return BaseSimplylinkApiObject|BaseSimplylinkApiObject[]|null|mixed
     * @throws \Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function getRecordsList(array $params = null)
    {
        $paramsString =  ($params) ? '?' . http_build_query($params) : '';
        
        $uri = $this->setApiPath() . $paramsString;
        SLBaseUtils::getLogger()->info('Get record list started',['url' =>  $uri]);
    
        $options = [];
    
        $additionalOptions = $this->setRequestOptions(self::SL_API_ACTION_READ);
        if(!$additionalOptions)
        {
            $options = array_merge($options,$additionalOptions);
        }
    
        $response = $this->client->request('GET',$uri,$options);
        
        return $this->parseResponse($response, $this->getApiObjectModel());
    }
    
    
}
