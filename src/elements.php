<?php
namespace Shop\Markus;
abstract class Elements {
  public $name;
  public $basePrice;
  public  $tax = 0.07;

  public function __construct($name, $basePrice) {
      $this->name = $name;
      $this->basePrice = $basePrice;
  }

  
  public function calcPrice()
  {
    return $this->basePrice + ($this->basePrice * $this->tax);
  }
  // abstract public function elementoCaducado();
  public function modificarImpuesto($newTax){ $this->tax = $newTax; }

  public function __toString(){ return "Nombre: $this->name \nPrecio base: $this->basePrice"; }
}
