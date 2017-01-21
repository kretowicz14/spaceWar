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
     * @ORM\Column(name="system_type", type="string")
     */
    private $systemType;

    /**
     * @ORM\Column(name="system_name", type="string", nullable=true)
     */
    private $systemName;

    /**
     * @ORM\Column(name="system_luck", type="integer")
     */
    private $systemLuck;

    /**
     * SpaceSystem constructor.
     */
    public function __construct()
    {

    }
}