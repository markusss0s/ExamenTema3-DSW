<?php

use Markus\Shop\Services;

class ServiciosNormales extends Services{
  public function __construct($name, $basePrice){ 
    parent::__construct($name, $basePrice);
  }
  public function __toString(){
    return parent::__toString();
  }
}