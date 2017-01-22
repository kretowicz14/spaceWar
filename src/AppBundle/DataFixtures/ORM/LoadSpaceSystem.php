<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 22.01.17
 * Time: 00:39
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\SpacePlanet;
use AppBundle\Entity\SpaceSystem;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadSpaceSystem extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;
    private $percentageLuck = 20;
    private $maximumOrbits = 32;
    private $minimumOrbits = 8;
    private $minimumEmptyOrbits = 2;
    private $maximumEmptyOrbits = 5;
    private $minimumMoons = 0;
    private $maximumMoons = 6;
    private $orbitNumbers;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 1000; $i++) {
            $this->orbitNumbers = array();
            $spaceSystem = new SpaceSystem();

            $spaceSystem->setLuck(rand(0, $this->percentageLuck * 2) - 20);
            $spaceSystem->setPlanetOrbitLeft(rand($this->minimumOrbits, $this->maximumOrbits));
            $spaceSystem->setOrbits($spaceSystem->getPlanetOrbitLeft());

            // Calculate planets and moons.
            $orbitsLeft = $spaceSystem->getPlanetOrbitLeft() - rand($this->minimumEmptyOrbits, $this->maximumEmptyOrbits);

            // Get random orbit unique number
            for ($j = $orbitsLeft; $j > 0; $j--) {
                do {
                    $randOrbit = rand(0, $spaceSystem->getPlanetOrbitLeft());
                } while (in_array($randOrbit, $this->orbitNumbers));
                $this->orbitNumbers[] = $randOrbit;
            }

            // Rand moons count and create orbits planet
            $moonsCount = rand($this->minimumMoons, $this->maximumMoons);
            foreach ($this->orbitNumbers as $orbit) {
                $spacePlanet = new SpacePlanet();
                $spacePlanet->setOrbitNumber($orbit);
                $spacePlanet->setOwned(false);
                $spacePlanet->setSpaceSystemId($i);
                $spacePlanet->setBuildings(
                    array(

                    ));
                $spacePlanet->setResources(
                    array(
                        "wood" => 0,
                        "stone" => 0,
                        "iron" => 0,
                        "oil" => 0,
                        "antimatter" => 0
                    ));
                if ($moonsCount) {
                    $spacePlanet->setType('moon');
                    $moonsCount--;
                } else {
                    $spacePlanet->setType('planet');
                }
                $manager->persist($spacePlanet);
            }

            $spaceSystem->setPlanetOrbitLeft($spaceSystem->getPlanetOrbitLeft() - $orbitsLeft);
            $manager->persist($spaceSystem);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 20;
    }
}