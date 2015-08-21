<?php

namespace AppBundle\Entity;


class Estimate
{
  protected $estimate;
  protected $duplicates;
  protected $versions;

  public function getEstimate()
  {
    return $this->estimate;
  }

  public function setEstimate($estimate)
  {
    $this->estimate = $estimate;
  }

  public function getDuplicates()
  {
    return $this->duplicates;
  }

  public function getVersions()
  {
    return $this->versions;
  }
}
