<?php

require "../vendor/autoload.php";
require "virtualShop.php";

if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];

  if ($filter == 'all') {
    $shop->showElements();
  } else if ($filter == 'products') {
    $shop->showProducts();
  } else if ($filter == 'services') {
    $shop->showServices();
  } else if ($filter == 'expirationDate') {
    $shop->showElementsExpirationDate();
  } else if ($filter == 'unexpired') {
    $shop->showNoExpired();
  }
}
