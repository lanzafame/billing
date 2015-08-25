<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity
 */
class Client
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
     * @var integer
     *
     * @ORM\Column(name="estimatedArtefacts", type="integer")
     */
    private $estimatedArtefacts;

    /**
     * @var string
     *
     * @ORM\Column(name="duplicates", type="decimal", precision=8, scale=2)
     */
    private $duplicates;

    /**
     * @var string
     *
     * @ORM\Column(name="versions", type="decimal", precision=8, scale=2)
     */
    private $versions;


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
     * Set estimatedArtefacts
     *
     * @param integer $estimatedArtefacts
     * @return Client
     */
    public function setEstimatedArtefacts($estimatedArtefacts)
    {
        $this->estimatedArtefacts = $estimatedArtefacts;

        return $this;
    }

    /**
     * Get estimatedArtefacts
     *
     * @return integer
     */
    public function getEstimatedArtefacts()
    {
        return $this->estimatedArtefacts;
    }

    /**
     * Set duplicates
     *
     * @param string $duplicates
     * @return Client
     */
    public function setDuplicates($duplicates)
    {
        $this->duplicates = $duplicates;

        return $this;
    }

    /**
     * Get duplicates
     *
     * @return string
     */
    public function getDuplicates()
    {
        return $this->duplicates;
    }

    /**
     * Set versions
     *
     * @param string $versions
     * @return Client
     */
    public function setVersions($versions)
    {
        $this->versions = $versions;

        return $this;
    }

    /**
     * Get versions
     *
     * @return string
     */
    public function getVersions()
    {
        return $this->versions;
    }
}
