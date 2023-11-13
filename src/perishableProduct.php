<?php

use Shop\Markus;
use Shop\Markus\Products;

class PerishableProduct extends Products implements expired
{
  public $maxDate;
  public function __construct($name, $basePrice, $creatorName, $weight, $volume, $maxDate)
  {
    parent::__construct($name, $basePrice, $creatorName, $weight, $volume);
    $this->maxDate = $maxDate;
  }
  public function daysLeft()
  {
    $now = new DateTime();
    $date = new DateTime($this->maxDate);
    $diff = $date->diff($now);
    return $diff->days;
  }
  public function elementExpired()
  {
    // En esta misma función calculamos el precio implementando el descuento
    if ($this->daysLeft() != null) {
      if (self::daysLeft() <= 30) return (parent::calcPrice() - ($this->basePrice * 0.10));
      else if (self::daysLeft() <= 10) return (parent::calcPrice() - ($this->basePrice * 0.25));
    }
  }

  public function __toString()
  {
    return parent::__toString() . "\nFecha límite : $this->maxDate";
  }
}
