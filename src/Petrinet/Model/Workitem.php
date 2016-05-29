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
 * Implementation of TokenInterface.
 *
 * @ORM\Table(name="wf_workitem")
 * @ORM\Entity()
 */
class Workitem
{
    const STATUS_ENABLED = 0;
    const STATUS_IN_PROGRESS = 1;
    const STATUS_CANCELLED = 2;
    const STATUS_FINISHED = 3;

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
     * @var WfCase
     *
     * @ORM\ManyToOne(targetEntity="WfCase")
     * @ORM\JoinColumn(name="case", referencedColumnName="id")
     */
    protected $case;

    /**
     * @var Transition
     *
     * @ORM\ManyToOne(targetEntity="Transition")
     * @ORM\JoinColumn(name="transition", referencedColumnName="id")
     */
    protected $transition;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    protected $status = self::STATUS_ENABLED;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enabledDate", type="datetime", nullable=false)
     */
    protected $enabledDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cancelledDate", type="datetime", nullable=true)
     */
    protected $cancelledDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finishedDate", type="datetime", nullable=true)
     */
    protected $finishedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="datetime", nullable=true)
     */
    protected $deadline;

    /**
     * Gets the id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function setCase(WfCase $case)
    {
        $this->case = $case;
        return $this;
    }
    public function getCase()
    {
        return $this->case;
    }

    public function setTransition(Transition $transition)
    {
        $this->transition = $transition;
        return $this;
    }
    public function getTransition()
    {
        return $this->transition;
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

    public function setEnabledDate(\DateTime $enabledDate)
    {
        $this->enabledDate = $enabledDate;
        return $this;
    }
    public function getEnabledDate()
    {
        return $this->enabledDate;
    }

    public function setCancelledDate(\DateTime $cancelledDate = null)
    {
        $this->cancelledDate = $cancelledDate;
        return $this;
    }
    public function getCancelledDate()
    {
        return $this->cancelledDate;
    }

    public function setFinishedDate(\DateTime $finishedDate = null)
    {
        $this->finishedDate = $finishedDate;
        return $this;
    }
    public function getFinishedDate()
    {
        return $this->finishedDate;
    }

    public function setDeadline(\DateTime $deadline = null)
    {
        $this->deadline = $deadline;
        return $this;
    }
    public function getDeadline()
    {
        return $this->deadline;
    }
}
