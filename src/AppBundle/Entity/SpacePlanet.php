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
     * @ORM\Column(name="owned", type="boolean")
     */
    private $owned;

    /**
     * @ORM\Column(name="owner_id", type="integer")
     */
    private $ownerId;

    /**
     * @ORM\Column(name="space_system_id", type="integer")
     */
    private $spaceSystemId;

    /**
     * @ORM\Column(name="resources", type="json_array")
     */
    private $resources;

    /**
     * @ORM\Column(name="buildings", type="json_array")
     */
    private $buildings;


    /**
     * SpacePlanet constructor.
     */
    public function __construct()
    {

    }
}