<?php
namespace Shop\Markus;
use DateTime;


class MixedServices extends Services implements Expired
{
  private $maxDate;
  private $sessions;
  public function __construct($name, $basePrice, $maxDate, $sessions){
    parent::__construct($name, $basePrice);
    $this->maxDate = $maxDate;
    $this->sessions = $sessions;
  }
  public  function daysLeft()
  {
    $now = new DateTime();
    $date = new DateTime($this->maxDate);
    $diff = $date->diff($now);
    return $diff->days;
  }
  public function expired()
  {
    $now = new DateTime();
    $maxDate = new DateTime();
    return $now > $maxDate;
  }
  public function elementExpired(){
    if ($this->daysLeft() != null) {
      if (self::daysLeft() <= 7) return (parent::calcBasePrice() + ($this->basePrice * 0.20));
      else if (self::daysLeft() == 1) return (parent::calcBasePrice() + ($this->basePrice * 0.50));
    }
  }

  public function consume() {
    $this->sessions -1;
    if ($this->sessions == 0) return true;
  }
  public function __toString(){
    return parent::__toString(). "Fecha: $this->maxDate \nSesiones restantes: $this->sessions";
  }
}
