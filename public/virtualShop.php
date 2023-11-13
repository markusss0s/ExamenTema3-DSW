<?php

use Shop\Markus\Elements;
use Shop\Markus\EventsServices;
use Shop\Markus\Products;
use Shop\Markus\MixedServices;
use Shop\Markus\NormalServices;
use Shop\Markus\PerishableProduct;
use Shop\Markus\Services;
use Shop\Markus\SessionsServices;
use Shop\Markus\Shop;

$shop = new Shop();

// 5 PRODUCTOS:

// 2 Productos no perecederos
$shop->addElements(new Products("Raton", 32, "Logitech", 50, 120));
$shop->addElements(new Products("Teclado", 42.99, "Krom", 100, 200));
// 1 Producto perecedero caducado
$shop->addElements(new PerishableProduct("Refresco", 1.50, "CocaCola", 2, 4, "2022/12/30"));
// 1 Producto perecedero que caduque en 2 o 3 dias
$shop->addElements(new PerishableProduct("Monitor", 100, "NOC", 500, 800, "2023/11/20"));
// 1 Producto perecedero que caduque en 20 o 25 dias
$shop->addElements(new PerishableProduct("PC", 230, "Koke", 2000, 3000, "2023/12/10"));
