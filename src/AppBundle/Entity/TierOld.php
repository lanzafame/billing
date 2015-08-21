<?php

namespace AppBundle\Entity;

class Tier
{
  public $name;
  public $price;
  public $range;
  public $min_range;
  public $max_range;

  public function _construct($name, $price, $range, $min_range, $max_range) {
    $this->name = $name;
    $this->price = $price;
    $this->range = $range;
    $this->min_range = $min_range;
    $this->max_range = $max_range;
  }

  public function getName()
  {
    return
  }
}
