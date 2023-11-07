<?php
namespace Shop\Markus\sesiones;
class Sesiones {
  private $numeroSesiones;
  private $sesion;
  public function __construct($numeroSesiones, $sesion){
    $this->numeroSesiones = $numeroSesiones;
    $this->sesion = $sesion;
  }
  public function numeroSesiones() {
    $this->numeroSesiones--;
  }
  public function __toString(){
    return `$this->numeroSesiones $this->sesion`;
  }
}