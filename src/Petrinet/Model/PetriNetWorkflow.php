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

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Workflow collection
 *
 * @ORM\Table(name="wf_workflow")
 * @ORM\Entity()
 */
class PetriNetWorkflow implements PetrinetInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=80, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="desc", type="text", nullable=true)
     */
    private $desc;

    /**
     * The places.
     *
     * @var ArrayCollection
     */
    protected $places;

    /**
     * The transitions.
     *
     * @var ArrayCollection
     */
    protected $transitions;

    /**
     * Creates a new Petrinet.
     */
    public function __construct()
    {
        $this->places = new ArrayCollection();
        $this->transitions = new ArrayCollection();
    }

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
     * Adds a place.
     *
     * @param PlaceInterface $place
     */
    public function addPlace(PlaceInterface $place)
    {
        $this->places[] = $place;
    }

    /**
     * Tells if the Petrinet has the given place.
     *
     * @param PlaceInterface $place
     *
     * @return boolean
     */
    public function hasPlace(PlaceInterface $place)
    {
        return $this->places->contains($place);
    }

    /**
     * Removes a place.
     *
     * @param PlaceInterface $place
     */
    public function removePlace(PlaceInterface $place)
    {
        $this->places->removeElement($place);
    }

    /**
     * {@inheritdoc}
     */
    public function setPlaces($places)
    {
        $this->places = new ArrayCollection();

        foreach ($places as $place) {
            $this->addPlace($place);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * Adds a transition.
     *
     * @param TransitionInterface $transition
     */
    public function addTransition(TransitionInterface $transition)
    {
        $this->transitions[] = $transition;
    }

    /**
     * Tells if the Petrinet has the given transition.
     *
     * @param TransitionInterface $transition
     *
     * @return boolean
     */
    public function hasTransition(TransitionInterface $transition)
    {
        return $this->transitions->contains($transition);
    }

    /**
     * Removes a transition.
     *
     * @param TransitionInterface $transition
     */
    public function removeTransition(TransitionInterface $transition)
    {
        $this->transitions->removeElement($transition);
    }

    /**
     * {@inheritdoc}
     */
    public function setTransitions($transitions)
    {
        $this->transitions = new ArrayCollection();

        foreach ($transitions as $transition) {
            $this->addTransition($transition);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getTransitions()
    {
        return $this->transitions;
    }
}
