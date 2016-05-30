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
 * Base class for the arcs.
 *
 * @ORM\Table(name="wf_arc")
 * @ORM\Entity()
 */
class Arc implements ArcInterface
{
    const DIRECTION_PLACE_TO_TRANSITION = 0;
    const DIRECTION_TRANSITION_TO_PLACE = 1;

    const TYPE_SEQ = 0;
    const TYPE_EXPLICIT_OR_SPLIT = 1;
    const TYPE_IMPLICIT_OR_SPLIT = 2;
    const TYPE_OR_JOIN = 3;
    const TYPE_AND_SPLIT = 4;
    const TYPE_AND_JOIN = 5;

    /**
     * The id.
     *
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * The place.
     *
     * @var Place
     * @ORM\ManyToOne(targetEntity="Place")
     * @ORM\JoinColumn(name="place", referencedColumnName="id")
     */
    protected $place;

    /**
     * The transition.
     *
     * @var Transition
     * @ORM\ManyToOne(targetEntity="Transition")
     * @ORM\JoinColumn(name="transition", referencedColumnName="id")
     */
    protected $transition;

    /**
     * Direction.
     *
     * @var integer
     * @ORM\Column(name="direction", type="smallint", nullable=false)
     */
    protected $direction;

    /**
     * The weight.
     *
     * @var integer
     * @ORM\Column(name="weight", type="smallint", nullable=false)
     */
    protected $weight = 1;

    /**
     * Type.
     *
     * @var integer
     * @ORM\Column(name="type", type="smallint", nullable=false)
     */
    protected $type = self::TYPE_SEQ;

    /**
     * Arc Specification.
     *
     * @var string
     * @ORM\Column(name="arcSpecification", type="string", length=256, nullable=true)
     */
    protected $arcSpecification;

    /**
     * Arc Type (color).
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

    /**
     * {@inheritdoc}
     */
    public function setPlace(Place $place)
    {
        $this->place = $place;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * {@inheritdoc}
     */
    public function setTransition(Transition $transition)
    {
        $this->transition = $transition;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransition()
    {
        return $this->transition;
    }

    /**
     * {@inheritdoc}
     */
    public function setWeight($weight)
    {
        if ($weight < 0) {
            throw new \InvalidArgumentException('The weight must be a positive integer.');
        }

        $this->weight = $weight;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getWeight()
    {
        return $this->weight;
    }

    public function setDirection($direction)
    {
        $this->direction = $direction;
        return $this;
    }
    public function getDirection()
    {
        return $this->direction;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    public function getType()
    {
        return $this->type;
    }

    public function setArcSpecification($arcSpecification)
    {
        $this->arcSpecification = $arcSpecification;
        return $this;
    }
    public function getArcSpecification()
    {
        return $this->arcSpecification;
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
