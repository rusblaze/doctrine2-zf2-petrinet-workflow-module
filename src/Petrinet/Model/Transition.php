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

/**
 * Implementation of TransitionInterface.
 *
 * @ORM\Table(name="wf_transition")
 * @ORM\Entity()
 */
class Transition
{
    const USER = 1;
    const AUTO = 2;
    const MSG  = 3;
    const TIME = 4;

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
     * @ORM\Column(name="trigger", type="smallint", nullable=false)
     */
    protected $trigger = self::AUTO;

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

    /**
     * @var string
     *
     * @ORM\Column(name="timeLimit", type="string", nullable=true)
     */
    protected $timeLimit;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length="256", nullable=false)
     */
    protected $action;

    public function getId()
    {
        return $this->id;
    }

    public function setWorkflow(PetriNetWorkflow $workflow)
    {
        $this->workflow = $workflow;
    }
    public function getWorkflow()
    {
        return $this->workflow;
    }

    public function setTrigger($trigger)
    {
        $this->trigger = $trigger;
    }
    public function getTrigger()
    {
        return $this->trigger;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }
    public function getDesc()
    {
        return $this->desc;
    }

    public function setTimeLimit($timeLimit)
    {
        if (is_string($timeLimit)) {
            $this->timeLimit = new \DateInterval($timeLimit);
        } elseif ($this->timeLimit instanceof \DateInterval) {
            $this->timeLimit = $timeLimit;
        } else {
            throw new \Exception('Wrong time limit');
        }
    }
    public function getTimeLimit()
    {
        return $this->timeLimit;
    }

    public function setAction($action)
    {
        $this->action = $action;
    }
    public function getTction()
    {
        return $this->action;
    }
}
