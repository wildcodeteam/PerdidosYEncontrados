<?php
namespace LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="city")
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * Many City have One Province.
     * @ORM\ManyToOne(targetEntity="Province", inversedBy="cities")
     */
    private $province;

    /**
     * One City has Many User.
     * @ORM\OneToMany(targetEntity="AccountBundle\Entity\User", mappedBy="city")
     */
    private $users;

    /**
     * One City has Many Ads.
     * @ORM\OneToMany(targetEntity="AdsBundle\Entity\Ads", mappedBy="city")
     */
    private $publications;

    public function __construct()
    {
        parent::__construct();
        $this->users = new ArrayCollection();
        $this->publications = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return City
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
     * Set province
     *
     * @param \LocationBundle\Entity\Province $province
     *
     * @return City
     */
    public function setProvince(\LocationBundle\Entity\Province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \LocationBundle\Entity\Province
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Add user
     *
     * @param \AccountBundle\Entity\User $user
     *
     * @return City
     */
    public function addUser(\AccountBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AccountBundle\Entity\User $user
     */
    public function removeUser(\AccountBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add publication
     *
     * @param \AdsBundle\Entity\Ads $publication
     *
     * @return City
     */
    public function addPublication(\AdsBundle\Entity\Ads $publication)
    {
        $this->publications[] = $publication;

        return $this;
    }

    /**
     * Remove publication
     *
     * @param \AdsBundle\Entity\Ads $publication
     */
    public function removePublication(\AdsBundle\Entity\Ads $publication)
    {
        $this->publications->removeElement($publication);
    }

    /**
     * Get publications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPublications()
    {
        return $this->publications;
    }
}
