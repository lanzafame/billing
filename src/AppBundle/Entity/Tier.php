<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tier
 *
 * @ORM\Table("tiers")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TierRepository")
 */
class Tier
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="sizeRange", type="integer")
     */
    private $sizeRange;

    /**
     * @var integer
     *
     * @ORM\Column(name="minRange", type="integer")
     */
    private $minRange;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxRange", type="integer")
     */
    private $maxRange;


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
     * @return Tier
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
     * Set price
     *
     * @param string $price
     * @return Tier
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set sizeRange
     *
     * @param integer $sizeRange
     * @return Tier
     */
    public function setSizeRange($sizeRange)
    {
        $this->sizeRange = $sizeRange;

        return $this;
    }

    /**
     * Get sizeRange
     *
     * @return integer
     */
    public function getSizeRange()
    {
        return $this->sizeRange;
    }

    /**
     * Set minRange
     *
     * @param integer $minRange
     * @return Tier
     */
    public function setMinRange($minRange)
    {
        $this->minRange = $minRange;

        return $this;
    }

    /**
     * Get minRange
     *
     * @return integer
     */
    public function getMinRange()
    {
        return $this->minRange;
    }

    /**
     * Set maxRange
     *
     * @param integer $maxRange
     * @return Tier
     */
    public function setMaxRange($maxRange)
    {
        $this->maxRange = $maxRange;

        return $this;
    }

    /**
     * Get maxRange
     *
     * @return integer
     */
    public function getMaxRange()
    {
        return $this->maxRange;
    }
}
