<?
namespace Shop\Markus;
use DateTime;
//use Shop\Markus\elementos\Elemento;


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
    //$this->fechaCaduc = date_format($this->fechaCaduc,'Y-m-d');
  }

  public function shippingCost()
  {
    $price = 0;
    while ($price <= $this->volume) {
      $price++;
    }
    return (2 + ($this->weight * 0.0002) + $price);
  }

  public function calcPriceTax(){
    return parent::calcPrice() + $this->shippingCost();
  }
  public function __toString()
  {
    return parent::__toString() . "\nPeso: $this->weight \nVolumen: $this->volume \nCoste de envío: ". $this->shippingCost();
  }
  

  
}
