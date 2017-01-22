<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 21.01.17
 * Time: 23:41
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="space_planets")
 */
class SpacePlanet
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="type", type="string")
     */
    private $type;

    /**
     * @ORM\Column(name="owned", type="boolean")
     */
    private $owned;

    /**
     * Many Planets have one User.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="spacePlanet")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="owner_id")
     * @ORM\Column(name="owner_id", type="integer", nullable=true)
     */
    private $ownerId;

    /**
     * Many Planets have one SolarSystem.
     * @ORM\ManyToOne(targetEntity="SpaceSystem", inversedBy="spacePlanet")
     * @ORM\JoinColumn(name="space_system_id", referencedColumnName="space_system_id")
     * @ORM\Column(name="space_system_id", type="integer")
     */
    private $spaceSystemId;

    /**
     * @ORM\Column(name="resources", type="json_array")
     */
    private $resources;

    /**
     * @ORM\Column(name="update_resources_time", type="datetime", nullable=true)
     */
    private $updateResourcesTime;

    /**
     * @ORM\Column(name="buildings", type="json_array")
     */
    private $buildings;

    /**
     * @ORM\Column(name="update_buildings_time", type="datetime", nullable=true)
     */
    private $updateBuildingsTime;

    /**
     * @ORM\Column(name="points", type="integer")
     */
    private $points;

    /**
     * @ORM\Column(name="update_points_time", type="datetime", nullable=true)
     */
    private $updatePointsTime;

    /**
     * @ORM\Column(name="orbit_number", type="integer")
     */
    private $orbitNumber;


    /**
     * SpacePlanet constructor.
     */
    public function __construct()
    {
        $this->points = 0;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getOwned()
    {
        return $this->owned;
    }

    /**
     * @param mixed $owned
     */
    public function setOwned($owned)
    {
        $this->owned = $owned;
    }

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @param mixed $ownerId
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    }

    /**
     * @return mixed
     */
    public function getSpaceSystemId()
    {
        return $this->spaceSystemId;
    }

    /**
     * @param mixed $spaceSystemId
     */
    public function setSpaceSystemId($spaceSystemId)
    {
        $this->spaceSystemId = $spaceSystemId;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @param mixed $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getUpdateResourcesTime()
    {
        return $this->updateResourcesTime;
    }

    /**
     * @param mixed $updateResourcesTime
     */
    public function setUpdateResourcesTime($updateResourcesTime)
    {
        $this->updateResourcesTime = $updateResourcesTime;
    }

    /**
     * @return mixed
     */
    public function getBuildings()
    {
        return $this->buildings;
    }

    /**
     * @param mixed $buildings
     */
    public function setBuildings($buildings)
    {
        $this->buildings = $buildings;
    }

    /**
     * @return mixed
     */
    public function getUpdateBuildingsTime()
    {
        return $this->updateBuildingsTime;
    }

    /**
     * @param mixed $updateBuildingsTime
     */
    public function setUpdateBuildingsTime($updateBuildingsTime)
    {
        $this->updateBuildingsTime = $updateBuildingsTime;
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
    public function getOrbitNumber()
    {
        return $this->orbitNumber;
    }

    /**
     * @param mixed $orbitNumber
     */
    public function setOrbitNumber($orbitNumber)
    {
        $this->orbitNumber = $orbitNumber;
    }

}