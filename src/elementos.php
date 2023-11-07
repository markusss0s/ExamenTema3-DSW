<?php
namespace Shop\Markus\elementos;
interface Elementos  {
  public function caducado ();
  public function diasRestantes($fecha);
}