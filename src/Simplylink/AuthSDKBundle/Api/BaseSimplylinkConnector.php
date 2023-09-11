<?php

namespace Simplylink\AuthSDKBundle\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializationContext;
use Simplylink\AuthSDKBundle\Model\BaseSimplylinkApiObject;
use Simplylink\AuthSDKBundle\Model\SLoAuthAccessToken;
use Simplylink\AuthSDKBundle\Utils\SLApiExclusionStrategy;
use Simplylink\UtilsBundle\Utils\GenericDataManager;
use Simplylink\UtilsBundle\Utils\SLBaseUtils;

abstract class BaseSimplylinkConnector extends SLBaseUtils implements SimplylinkConnectorTemplate
{
    // max result in single api call
    const SL_MAX_RESULT_LIMIT = 250;
    
    const SL_API_ACTION_CREATE = 'CREATE';
    const SL_API_ACTION_READ = 'READ';
    const SL_API_ACTION_UPDATE = 'UPDATE';
    const SL_API_ACTION_DELETE = 'DELETE';
    
    protected $client;
    
    /**
     * BaseSimplylinkConnector constructor.
     *
     * @param SLoAuthAccessToken $token
     */
    public function __construct(SLoAuthAccessToken $token)
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'headers' => [
                'Authorization' => 'Bearer ' . $token->getAccessToken()
            ]
        ]);
    }
    
    
    /**
     * Get domain for simplylink api by environment.
     *
     * @return string
     */
    public static function getDomainForEnvironment()
    {
        // check environment
        if(parent::GetKernel()->getEnvironment() == 'prod')
            return 'simplylink.io';
        
        return 'simplylink.xyz';
    }
    
    /**
     * @param string $action Values are CREATE / READ / UPDATE / DELETE
     * @return SLApiExclusionStrategy[]
     */
    protected function setExclusionStrategyForAction($action){ return null; }
    
    /**
     * @param string $action Values are CREATE / READ / UPDATE / DELETE
     * @return array
     */
    protected function setRequestOptions($action){ return []; }
    
    /**
     * @return string
     */
    abstract protected function setApiPath();
    
    
    /**
     * @return BaseSimplylinkApiObject|mixed
     */
    abstract public function getApiObjectModel();
    
    
    /**
     * Parse the response and convert it to array of objects
     * @param Response $httpResponse
     * @param BaseSimplylinkApiObject $responseModel
     * @return null|BaseSimplylinkApiObject|BaseSimplylinkApiObject[]
     * @throws \Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument
     */
    public function parseResponse(Response $httpResponse, BaseSimplylinkApiObject $responseModel)
    {
        if($httpResponse->getStatusCode() < 200 || $httpResponse->getStatusCode() >= 300)
        {
            $logger = SLBaseUtils::getLogger();
            $context = [
                'http_status_code' => $httpResponse->getStatusCode(),
                'reason' => $httpResponse->getReasonPhrase()
            ];
            $logger->error('Simplylink SDK response error (status code invalid)',$context);
                
            return null;
        }
        
        $output = null;
        
        $body = $httpResponse->getBody();
        if($body)
        {
            $array = json_decode((string)$body,true);
            
            $records = GenericDataManager::getArrayValueForKey($array,'records',null);
            // if records field exists, then getList()
            $singleResult = ($records === null);
            
            if($singleResult)
                $records = $array;
            
            $container =  parent::GetKernelContainer();
            $serializer = $container->get('jms_serializer');
            if(!$responseModel)
                $type = get_class($this->getApiObjectModel());
            $type = get_class($responseModel);
            if(!$singleResult)
            {
                $type = 'array<' . $type . '>';
            }
    
            $exclusionStrategy = $this->setExclusionStrategyForAction(self::SL_API_ACTION_READ);
    
            $context = new SerializationContext();
            $context->setSerializeNull(true) // serialize null fields
            ->enableMaxDepthChecks();
    
    
            if($exclusionStrategy)
            {
                foreach ($exclusionStrategy as $strategy)
                {
                    $context->addExclusionStrategy($strategy);
                }
            }
            
            $output = $serializer->deserialize(json_encode($records), $type ,'json');
            
        }
        
        return $output;
        
    }
    
    
}
