<?php

namespace Shop\Markus;

use DateTime;

class PerishableProduct extends Products implements Expired
{
    public $maxDate;

    public function __construct($name, $basePrice, $creatorName, $weight, $volume, $maxDate)
    {
        parent::__construct($name, $basePrice, $creatorName, $weight, $volume);
        $this->maxDate = $maxDate;
    }

    public function daysLeft()
    {
        $now = new DateTime();
        $date = new DateTime($this->maxDate);
        $diff = $date->diff($now);
        return $diff->days;
    }

    public function expired()
    {
        $now = new DateTime();
        $maxDate = new DateTime($this->maxDate);
        return $now > $maxDate;
    }

    public function calcBasePrice(): float
    {
        // En esta misma función calculamos el precio implementando el descuento
        if ($this->daysLeft() !== null) {
            if ($this->daysLeft() <= 30) {
                return parent::calcBasePrice() + ($this->basePrice * 0.10);
            } elseif ($this->daysLeft() <= 10) {
                return parent::calcBasePrice() + ($this->basePrice * 0.25);
            }
        }

        return parent::calcBasePrice();
    }

    public function __toString()
    {
        return parent::__toString() . "<br>Fecha límite: $this->maxDate";
    }
}
