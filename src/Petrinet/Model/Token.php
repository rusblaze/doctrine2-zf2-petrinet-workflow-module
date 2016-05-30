<?php
/**
 * This file is part of the Petrinet framework.
 *
 * (c) Alexander Ivanov <rusblaze@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Petrinet\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Implementation of TokenInterface.
 *
 * @ORM\Table(name="wf_token")
 * @ORM\Entity()
 */
class Token
{
    const STATUS_FREE = 0;
    const STATUS_LOCKED = 1;
    const STATUS_CONSUMED = 2;
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
     * @var WfCase
     *
     * @ORM\ManyToOne(targetEntity="WfCase")
     * @ORM\JoinColumn(name="case", referencedColumnName="id")
     */
    protected $case;

    /**
     * @var Place
     *
     * @ORM\ManyToOne(targetEntity="Place")
     * @ORM\JoinColumn(name="place", referencedColumnName="id")
     */
    protected $place;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    protected $status = self::STATUS_FREE;

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
     * @ORM\Column(name="consumedDate", type="datetime", nullable=true)
     */
    protected $consumedDate;

    /**
     * Token Type (color).
     *
     * @var string
     * @ORM\Column(name="color", type="string", length=256, nullable=true)
     */
    protected $color;

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

    public function setPlace(Place $place)
    {
        $this->place = $place;
        return $this;
    }
    public function getPlace()
    {
        return $this->place;
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

    public function setConsumedDate(\DateTime $consumedDate = null)
    {
        $this->consumedDate = $consumedDate;
        return $this;
    }
    public function getConsumedDate()
    {
        return $this->consumedDate;
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }
    public function getColor()
    {
        return $this->color;
    }
}
