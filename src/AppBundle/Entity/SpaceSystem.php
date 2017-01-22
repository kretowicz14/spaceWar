<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 21.01.17
 * Time: 23:26
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="space_systems")
 */
class SpaceSystem
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(name="luck", type="integer")
     */
    private $luck;

    /**
     * @ORM\Column(name="planet_orbit_left", type="integer")
     */
    private $planetOrbitLeft;

    /**
     * @ORM\Column(name="orbits", type="integer")
     */
    private $orbits;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="SpacePlanet", mappedBy="space_system_id")
     */
    private $spacePlanet;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $luck
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;
    }

    /**
     * @return mixed
     */
    public function getPlanetOrbitLeft()
    {
        return $this->planetOrbitLeft;
    }


    /**
     * @param mixed $planetOrbitLeft
     */
    public function setPlanetOrbitLeft($planetOrbitLeft)
    {
        $this->planetOrbitLeft = $planetOrbitLeft;
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
    public function getOrbits()
    {
        return $this->orbits;
    }

    /**
     * @param mixed $orbits
     */
    public function setOrbits($orbits)
    {
        $this->orbits = $orbits;
    }

    /**
     * SpaceSystem constructor.
     */
    public function __construct()
    {

    }
}