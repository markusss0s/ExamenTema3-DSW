<?php
namespace Shop\Markus;

class SessionsServices extends Services {
  public $sessions;

  public function __construct($name, $basePrice, $sessions) {
      parent::__construct($name, $basePrice);
      $this->sessions = $sessions;
  }

  public function consume() {
    $this->sessions --;
    if ($this->sessions == 0) return true;
  }

  public function __toString(){
    return parent::__toString() . "Sesiones restantes: $this->sessions";
  }
}