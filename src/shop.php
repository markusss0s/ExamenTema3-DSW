<?php

use Shop\Markus\Products;
use Shop\Markus\Services;
use Shop\Markus\Elements;

class Tienda
{
  public $elements;
  public function addElements($element)
  {
    $this->elements[] = $element;
  }

  public function showElementos()
  {
    foreach ($this->elements as $e) {
      echo "<p>$e</p>";
    }
  }

  public function showProducts()
  {
    foreach ($this->elements as $e) {
      if (get_class($e) == Products::class) {
        echo "<p>$e</p>";
      }
    }
  }

  public function showServices()
  {
    foreach ($this->elements as $e) {
      if (get_class($e) == Services::class) {
        echo "<p>$e</p>";
      }
    }
  }

  public function showElementsData()
  {
    foreach ($this->elements as $e) {
      if (get_class($e) == Expired::class) {
        echo "<p>$e</p>";
      }
    }
  }

  // public function showNoExpired()
  // {
  //   foreach ($this->elements as $e) {
  //     if ($element == false) {
  //       echo "<br>{$element}<br>";
  //     }
  //   }

  // }
}
