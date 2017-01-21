<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\Column(name="last_update_points_time", type="datetime", nullable=true)
     */
    private $lastUpdatePointsTime;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getLastUpdatePointsTime()
    {
        return $this->lastUpdatePointsTime;
    }

    /**
     * @param mixed $lastUpdatePointsTime
     */
    public function setLastUpdatePointsTime($lastUpdatePointsTime)
    {
        $this->lastUpdatePointsTime = $lastUpdatePointsTime;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }


}