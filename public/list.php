<?php

require "../vendor/autoload.php";
require "virtualShop.php";

if (isset($_GET['filter'])) {
  $filtro = $_GET['filter'];

  if ($filtro == 'all') {
    $shop->showElements();
  } else if ($filtro == 'products') {
    $shop->showProducts();
  } else if ($filtro == 'services') {
    $shop->showServices();
  } else if ($filtro == 'expirationDate') {
    $shop->showElementsExpirationDate();
  } else if ($filtro == 'unexpired') {
    $shop->showNoExpired();
  }
}
