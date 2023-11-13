<?php

namespace Shop\Markus;
use DateTime;


class EventsServices extends Services implements Expired
{
  public $maxDate;
  public function __construct($name, $basePrice, $maxDate)
  {
    parent::__construct($name, $basePrice);
    $this->maxDate = $maxDate;
  }

  public function expired()
  {
    $now = new DateTime();
    $maxDate = new DateTime();
    return $now > $maxDate;
  }
  public  function daysLeft()
  {
    $now = new DateTime();
    $date = new DateTime($this->maxDate);
    $diff = $date->diff($now);
    return $diff->days;
  }

  public function calcBasePrice(){
    if ($this->daysLeft() != null) {
      if (self::daysLeft() <= 7) return (parent::calcBasePrice() + ($this->basePrice * 0.20));
      else if (self::daysLeft() == 1) return (parent::calcBasePrice() + ($this->basePrice * 0.50));
    }
  }

  public function __toString(){
    return parent::__toString() . "Fecha de ejecución: " . $this->daysLeft() ;
  }
}
