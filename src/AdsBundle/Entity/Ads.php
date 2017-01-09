<?php
namespace AdsBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ads")
 * @ORM\HasLifecycleCallbacks
 */
class Ads
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(length=140, nullable=true) */
    private $type;

    /** @ORM\Column(length=140, nullable=true) */
    private $date;

    /** @ORM\Column(length=140, nullable=true) */
    private $status;    

    /** @ORM\Column(type="text", nullable=true) */
    private $description;

    /**
     * Many Ads have One User.
     * @ORM\ManyToOne(targetEntity="AccountBundle\Entity\User", inversedBy="publications")
     */
    private $publisher;

    /**
     * One Ads has One Pet.
     * @ORM\OneToOne(targetEntity="PetBundle\Entity\Pet", inversedBy="publication")
     */
    private $pet;

    /**
     * Many Ads have One City.
     * @ORM\ManyToOne(targetEntity="LocationBundle\Entity\City", inversedBy="publications")
     */
    private $city;

    /** @ORM\Column(type="date", nullable=true) */
    private $expireAt;

    /** @ORM\Column(type="datetime") */
    private $createdAt;

    /** @ORM\Column(type="datetime") */
    private $updatedAt;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

     /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $this->setUpdatedAt(new \DateTime('now'));

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Ads
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
     * Set date
     *
     * @param string $date
     *
     * @return Ads
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Ads
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Ads
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
     * Set expireAt
     *
     * @param \DateTime $expireAt
     *
     * @return Ads
     */
    public function setExpireAt($expireAt)
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    /**
     * Get expireAt
     *
     * @return \DateTime
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Ads
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Ads
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set publisher
     *
     * @param \FOS\UserBundle\Model\User $publisher
     *
     * @return Ads
     */
    public function setPublisher(\FOS\UserBundle\Model\User $publisher = null)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return \FOS\UserBundle\Model\User
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set pet
     *
     * @param \PetBundle\Entity\Pet $pet
     *
     * @return Ads
     */
    public function setPet(\PetBundle\Entity\Pet $pet = null)
    {
        $this->pet = $pet;

        return $this;
    }

    /**
     * Get pet
     *
     * @return \PetBundle\Entity\Pet
     */
    public function getPet()
    {
        return $this->pet;
    }

    /**
     * Set city
     *
     * @param \AdsBundle\Entity\City $city
     *
     * @return Ads
     */
    public function setCity(\AdsBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AdsBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }
}
