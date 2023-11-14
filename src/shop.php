<?php

namespace Shop\Markus;

class Shop
{
  public $elements;
  public function addElements($element)
  {
    $this->elements[] = $element;
  }

  public function showElements()
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

  public function showElementsExpirationDate()
  {
    foreach ($this->elements as $e) {
      if (get_class($e) == Expired::class) {
        echo "<p>$e</p>";
      }
    }
  }

  public function showNoExpired()
  {
    foreach ($this->elements as $e) {
      if ($e->expired() == false) {
        echo "<br>{$e}<br>";
      }
    }
  }
}
