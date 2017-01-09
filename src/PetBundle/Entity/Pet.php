<?php
namespace PetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="pet")
 */
class Pet
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(length=140, nullable=true) */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $type;

    /** @ORM\Column(length=140, nullable=true) */
    private $breed;

    /** @ORM\Column(length=140, nullable=true) */
    private $hair;

    /** @ORM\Column(length=140, nullable=true) */
    private $colour;

    /** @ORM\Column(length=140, nullable=true) */
    private $gender;

    /** @ORM\Column(type="integer", nullable=true) */
    private $age;

    /** @ORM\Column(length=140, nullable=true) */
    private $size;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * One Pet has One Ads.
     * @ORM\OneToOne(targetEntity="AdsBundle\Entity\Ads", mappedBy="pet")
     */
    private $publication;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

 
    /**
     * Set name
     *
     * @param string $name
     *
     * @return Pet
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Pet
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set breed
     *
     * @param string $breed
     *
     * @return Pet
     */
    public function setBreed($breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get breed
     *
     * @return string
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set hair
     *
     * @param string $hair
     *
     * @return Pet
     */
    public function setHair($hair)
    {
        $this->hair = $hair;

        return $this;
    }

    /**
     * Get hair
     *
     * @return string
     */
    public function getHair()
    {
        return $this->hair;
    }

    /**
     * Set colour
     *
     * @param string $colour
     *
     * @return Pet
     */
    public function setColour($colour)
    {
        $this->colour = $colour;

        return $this;
    }

    /**
     * Get colour
     *
     * @return string
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Pet
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

       /**
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }


    /**
     * Set size
     *
     * @param string $size
     *
     * @return Pet
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Pet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set publication
     *
     * @param \AdsBundle\Entity\Ads $publication
     *
     * @return Pet
     */
    public function setPublication(\AdsBundle\Entity\Ads $publication = null)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return \AdsBundle\Entity\Ads
     */
    public function getPublication()
    {
        return $this->publication;
    }
}
