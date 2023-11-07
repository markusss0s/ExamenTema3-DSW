<?php

use Shop\Markus\productos\Productos;
use DateTime;

class Eventos extends Productos 
{
  private $fechaEvento;
  public $precioEventos;
  public function __construct($fechaEvento, $precioEventos)
  {
    $this->fechaEvento = $fechaEvento;
    $this->precioEventos = $precioEventos;
    if (self::diasRestantesEvento()->days > 7) {
      $this->precioEventos += $this->precioEventos * 0.20;
    } else if (self::diasRestantesEvento()->days == $fechaEvento->days) {
      $this->precioEventos += $this->precioEventos * 0.50;
    }
  }
  public function caducadoEvento()
  {
    $this->fechaEvento = new DateTime();
  }
  public static function diasRestantesEvento()
  {
    return parent::diasRestantes(self::$fechaEvento);
  }
}
