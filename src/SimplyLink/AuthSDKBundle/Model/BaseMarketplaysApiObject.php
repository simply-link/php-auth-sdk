<?php
/**
 * Created by PhpStorm.
 * User: ronfridman
 * Date: 28/09/2017
 * Time: 10:08
 */

namespace SimplyLink\AuthSDKBundle\Model;

use JMS\Serializer\Annotation as JMS;

class BaseSimplyLinkApiObject
{
    /**
     * A unique numeric identifier for the resource.
     *
     * @var integer
     * @JMS\Accessor(getter="getId",setter="setId")
     * @JMS\Type("int")
     */
    protected $id;
    
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     * @return BaseSimplyLinkApiObject|mixed
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    
}