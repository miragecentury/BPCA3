<?php

namespace A3\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Island {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $label;

    /**     * */
    protected $sizeX;
    protected $sizeY;
    protected $safeTolerance;

    /**     * */

    /**
     * @ORM\ManyToOne(targetEntity="A3\Entity\Side", inversedBy="MasterSideIslands")
     */
    protected $MasterSide;

    /**
     * @ORM\ManyToOne(targetEntity="A3\Entity\Side", inversedBy="LocalSideIslands")
     */
    protected $LocalSide;

    /**
     * @ORM\ManyToOne(targetEntity="A3\Entity\Side", inversedBy="InsugencySideIslands")
     */
    protected $InsurgencySide;

    /**     * */

    /** @ORM\Column(type="boolean") */
    protected $isLockDown;

    /** @ORM\Column(type="boolean") */
    protected $isLockDownMilitary;

    /**     * */

    /**
     * @ORM\OneToMany(targetEntity="A3\Entity\Airport",mappedBy="Island")
     */
    protected $Airports;
    
    /**
     * @ORM\OneToMany(targetEntity="A3\Entity\Personnage",mappedBy="Island")
     */
    protected $Personnages;

}
