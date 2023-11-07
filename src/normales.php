<?php
use Shop\Markus\productos\Productos;

class Normales extends Productos{
  public function __construct($nombreFabricante, $nombre, $precioBase, $peso, $volumen) {
    parent::__construct($nombreFabricante, $nombre, $precioBase, $peso, $volumen);
  }
}