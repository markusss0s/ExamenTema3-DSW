<?php

namespace Shop\Markus;

class Products extends Elements
{
  public $creatorName;
  public $weight;
  public $volume;

  public function __construct($name, $basePrice, $creatorName,  $weight, $volume)
  {
    parent::__construct($name, $basePrice);
    $this->creatorName = $creatorName;
    $this->weight = $weight;
    $this->volume = $volume;
  }

  public function shippingCost()
  {
    $price = 0;
    while ($price <= $this->volume) {
      $price++;
    }
    return (2 + ($this->weight * 0.0002) + $price);
  }
  

  public function calcPriceTax()
  {
    return parent::calcBasePrice() + $this->shippingCost();
  }
  public function __toString()
  {
    return parent::__toString() . "<br>Peso: $this->weight <br>Volumen: $this->volume <br>Coste de envío: " . $this->shippingCost();
  }
}
