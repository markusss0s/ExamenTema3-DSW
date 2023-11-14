<?php

namespace Shop\Markus;

abstract class Elements
{
    protected $name;
    protected $basePrice;
    protected $tax = 0.07;

    public function __construct($name, $basePrice)
    {
        $this->name = $name;
        $this->basePrice = $basePrice;
    }

    public function calcBasePrice()
    {
        return $this->basePrice + ($this->basePrice * $this->tax);
    }

    public function setTax($newTax)
    {
        // Puedes agregar lógica de validación aquí si es necesario
        $this->tax = $newTax;
    }

    public function __toString()
    {
        return "Nombre: $this->name <br>Precio base: $this->basePrice";
    }
}
