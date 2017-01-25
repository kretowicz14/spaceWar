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
     * @ORM\Column(name="points", type="integer")
     */
    private $points;

    /**
     * @ORM\Column(name="update_points_time", type="datetime", nullable=true)
     */
    private $updatePointsTime;

    /**
     * One User have many Planets.
     * @ORM\OneToMany(targetEntity="SpacePlanet", mappedBy="user")
     */
    private $spacePlanet;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="surname", type="string")
     */
    private $surname;

    public function __construct()
    {
        parent::__construct();
        $this->points = 0;
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

    /**
     * @return mixed
     */
    public function getSpacePlanet()
    {
        return $this->spacePlanet;
    }

    /**
     * @param mixed $spacePlanet
     */
    public function setSpacePlanet($spacePlanet)
    {
        $this->spacePlanet = $spacePlanet;
    }

    /**
     * @return mixed
     */
    public function getUpdatePointsTime()
    {
        return $this->updatePointsTime;
    }

    /**
     * @param mixed $updatePointsTime
     */
    public function setUpdatePointsTime($updatePointsTime)
    {
        $this->updatePointsTime = $updatePointsTime;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

}