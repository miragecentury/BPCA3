<?php

namespace A3\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Airport {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $label;

    /**
     * @ORM\ManyToOne(targetEntity="A3\Entity\Island", inversedBy="Airports")
     */
    protected $Island;

    /**     * */

    /** @ORM\Column(type="boolean") */
    protected $isOnlyLocal = false;

    /** @ORM\Column(type="boolean") */
    protected $isOpenOut = false;

    /** @ORM\Column(type="boolean") */
    protected $isOpenIn = false;

    /**     * */
    
    
    /**     * */
}
