<?php

namespace A3Vehicle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Vehicle {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    #
    protected $matricule;
    #
    protected $buyregion;
    protected $buydate;        
    #
    protected $isSpawn;
    protected $region;
    protected $spawnLocation;
    protected $coordonnee;
    #
    protected $hashkeys;
    #
    protected $isGeoLoca = false;
    protected $lastGeoLoca;
    #
    protected $partIntegrity;
    protected $fuel;
    #
    protected $inventory;
    #
    protected $empreintes;
}
