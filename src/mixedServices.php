<?php

namespace Shop\Markus;

use DateTime;

class MixedServices extends Services implements Expired
{
    private $maxDate;
    private $sessions;

    public function __construct($name, $basePrice, $maxDate, $sessions)
    {
        parent::__construct($name, $basePrice);
        $this->maxDate = $maxDate;
        $this->sessions = $sessions;
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

    public function elementExpired()
    {
        if ($this->daysLeft() !== null) {
            if ($this->daysLeft() <= 7) {
                return parent::calcBasePrice() + ($this->basePrice * 0.20);
            } elseif ($this->daysLeft() == 1) {
                return parent::calcBasePrice() + ($this->basePrice * 0.50);
            }
        }
    }

    public function consume()
    {
        $this->sessions--;
        if ($this->sessions == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function __toString()
    {
        return parent::__toString() . "<br>Fecha: $this->maxDate <br>Sesiones restantes: $this->sessions";
    }
}
