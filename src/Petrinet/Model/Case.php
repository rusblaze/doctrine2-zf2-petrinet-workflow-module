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
 * @ORM\Table(name="wf_case")
 * @ORM\Entity()
 */
class Case
{
    const STATUS_OPEN = 0;
    const STATUS_CLOSED = 1;
    const STATUS_SUSPENDED = 2;
    const STATUS_CANCELLED = 3;

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
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    protected $status = self::STATUS_OPEN;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime", nullable=false)
     */
    protected $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime", nullable=true)
     */
    protected $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="trace", type="text", nullable=true)
     */
    private $trace;

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

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }
    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setEndDate(\DateTime $endDate = null)
    {
        $this->endDate = $endDate;
        return $this;
    }
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set message
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set trace
     *
     * @param string $trace
     */
    public function setTrace($trace)
    {
        $this->trace = $trace;

        return $this;
    }

    /**
     * Get trace
     *
     * @return string
     */
    public function getTrace()
    {
        return $this->trace;
    }
}
