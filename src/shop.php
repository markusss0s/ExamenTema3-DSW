<?php

namespace Shop\Markus;

class Shop
{
  public $elements = [];
  public function addElements($element)
  {
    $this->elements[] = $element;
  }

  public function showElements()
  {
    $arr = [];

    foreach ($this->elements as $e) {
      $arr[] = $e;
    }
    return $arr;
  }

  public function showProducts()
  {
    $arr = [];

    foreach ($this->elements as $e) {
      if ( $e instanceof Products) {
        $arr[] = $e;
      }
    }
    return $arr;
  }

  public function showServices()
  {
    $arr = [];
    foreach ($this->elements as $e) {
      if ( $e instanceof Services) {
        $arr[] = $e;
      }
    }
    return $arr;
  }

  public function showElementsExpirationDate()
  {
    $arr = [];
    foreach ($this->elements as $e) {
      if ( $e instanceof Expired) {
        $arr[] = $e;
      }
    }
    return $arr;
  }

  public function showNoExpired()
  {
    $arr = [];
    foreach ($this->showElementsExpirationDate() as $e) {
      if ($e->expired() == false) {
        $arr[] = $e;
      }
    }
    return $arr;
  }
}
