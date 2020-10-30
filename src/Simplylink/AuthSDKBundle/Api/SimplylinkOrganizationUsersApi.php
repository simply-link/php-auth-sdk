<?php


namespace Simplylink\AuthSDKBundle\Api;


use Simplylink\AuthSDKBundle\Model\SLoAuthAccessToken;
use Simplylink\AuthSDKBundle\Model\Organizations\OrganizationUsersModel;
use Simplylink\AuthSDKBundle\Utils\SLApiExclusionStrategy;
use Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionInvalidArgument;
use Simplylink\UtilsBundle\Utils\Exceptions\SLExceptionUnexpectedValue;
use Simplylink\UtilsBundle\Utils\SLResponseManager;


class SimplylinkOrganizationUsersApi extends SimplylinkCRUDConnector
{
    
    /**
     * @var int
     */
    private $organizationId;
    
    /**
     * SimplylinkOrganizationUsersApi constructor.
     *
     * @param int $organizationId
     * @param SLoAuthAccessToken $token
     * @throws SLExceptionUnexpectedValue
     */
    public function __construct($organizationId,SLoAuthAccessToken $token)
    {
        parent::__construct($token);
    
        if(!$organizationId || !is_int($organizationId))
            throw SLExceptionUnexpectedValue::expectedPositiveNumber('$organizationId',$organizationId);
        
        $this->organizationId = $organizationId;
    }
    
    protected function setApiPath()
    {
        return 'https://auth.' . self::getDomainForEnvironment() . '/api/organization/' . $this->organizationId . '/users';
    }
    
    public function getApiObjectModel()
    {
        return new OrganizationUsersModel();
    }
    
    
    /**
     * Attach an existing user to organization.
     * Special scope is required for this action - auth.organization.user.create
     *
     * @param int $userId
     * @param int $role
     * @return OrganizationUsersModel|null|mixed
     * @throws SLExceptionUnexpectedValue
     * @throws SLExceptionInvalidArgument
     */
    public function attachUserToOrganization($userId, $role)
    {
        if(!$userId || !is_int($userId))
            throw SLExceptionUnexpectedValue::expectedPositiveNumber('$userId',$userId);
    
        if(!$role || !is_int($role))
            throw SLExceptionUnexpectedValue::expectedPositiveNumber('$role',$role);
        
        $json = SLResponseManager::serialize(['user' => $userId, 'role' => $role]);
        $body = json_decode($json,true);
    
        $uri = $this->setApiPath();
        $response = $this->client->request('POST',$uri,[
            'json' => $body
        ]);
    
        return $this->parseResponse($response, $this->getApiObjectModel());
    }
    
    
    
    
    
    /**
     * @inheritDoc
     */
    public static function getSimplylinkRequiredScope()
    {
        return [
            'auth.organization',
            'auth.organization.users.create'
        ];
    }
    
    protected function setExclusionStrategyForAction($action)
    {
        if($action == parent::SL_API_ACTION_CREATE)
        {
            return [
                new SLApiExclusionStrategy(['firstName','lastName','email','profilePic'])
            ];
        }
    
        if($action == parent::SL_API_ACTION_UPDATE)
        {
            return [
                new SLApiExclusionStrategy(['firstName','lastName','email','profilePic','userId'])
            ];
        }
        
        return parent::setExclusionStrategyForAction($action);
    }
    
    
}