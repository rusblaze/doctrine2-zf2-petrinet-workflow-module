<?php

/**
 * This file is part of the Petrinet framework.
 *
 * (c) Florian Voutzinos <florian@voutzinos.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Petrinet\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Implementation of PlaceInterface.
 *
 * @author Florian Voutzinos <florian@voutzinos.com>
 * @ORM\Table(name="wf_place")
 * @ORM\Entity()
 */
class Place
{
    const START = 1;
    const END = 2;
    const INTERMEDIATE = 3;

    /**
     * The id.
     *
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Workflow
     *
     * @ORM\ManyToOne(targetEntity="PetriNetWorkflow")
     * @ORM\JoinColumn(name="workflow", referencedColumnName="id")
     */
    protected $workflow;

    /**
     * @var integer
     *
     * @ORM\Column(name="placeType", type="smallint", nullable=false)
     */
    protected $placeType = self::INTERMEDIATE;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="desc", type="text", nullable=true)
     */
    protected $desc;

    public function getId()
    {
        return $this->id;
    }

    public function setWorkflow(PetriNetWorkflow $workflow)
    {
        $this->workflow = $workflow;
        return $this;
    }
    public function getWorkflow()
    {
        return $this->workflow;
    }

    public function setPlaceType($placeType)
    {
        $this->placeType = $placeType;
        return $this;
    }
    public function getPlaceType()
    {
        return $this->placeType;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
        return $this;
    }
    public function getDesc()
    {
        return $this->desc;
    }
}
