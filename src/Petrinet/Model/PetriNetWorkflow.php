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
use Doctrine\ORM\Mapping as ORM;

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
     * @var boolean
     *
     * @ORM\Column(name="isValid", type="boolean", nullable=false)
     */
    private $isValid = false;

    /**
     * @var string
     *
     * @ORM\Column(name="startAction", type="string", length=256,  nullable=false)
     */
    private $startAction;

    /**
     * @var string
     *
     * @ORM\Column(name="startActionArguments", type="object", nullable=false)
     */
    private $startActionArguments;

    /**
     * The places.
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Place", mappedBy="workflow", cascade={"all"})
     */
    protected $places;

    /**
     * The transitions.
     *
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Transition", mappedBy="workflow", cascade={"all"})
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
        return $this;
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
        return $this;
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

        return $this;
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
        return $this;
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
        return $this;
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
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransitions()
    {
        return $this->transitions;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
        return $this;
    }

    public function getIsValid()
    {
        return $this->isValid;
    }

    public function setIsValid($isValid)
    {
        $this->isValid = (bool) $isValid;
        return $this;
    }

    public function getStartAction()
    {
        return $this->startAction;
    }

    public function setStartAction($startAction)
    {
        $this->startAction = $startAction;
        return $this;
    }

    public function getStartActionArguments()
    {
        return $this->startActionArguments;
    }

    public function setStartActionArguments($startActionArguments)
    {
        $this->startActionArguments = $startActionArguments;
        return $this;
    }
}
