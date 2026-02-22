<?php
require_once("../Models/DataBase.php");
require_once("../Models/Pizza.php");
require_once("../Models/Order.php");

session_start();
$connection = new DataBase();
$pizzas = $connection->getPizzas();
if(isset($_SESSION["order"])) $order = unserialize($_SESSION["order"]);
else header("Location: ./start_controller.php");

function getPizzaCategories(): array {
    global $pizzas;
    $categories = array_map(fn($pizza) => $pizza->getTipo(), $pizzas);
    return array_unique($categories);
}

function getPizzasByCategory(string $category): array {
    global $pizzas;
    return array_filter($pizzas, fn($pizza): bool => $pizza->getTipo() == $category);
}

function getPizzasInOrder(): array {
    global $order;
    return $order->getPizzas();
}

function noPizzasSelected(): bool {
    return count(getPizzasInOrder()) <= 0;
}

function getPrecioTotalFormateado(): string {
    global $order;
    $total = 0;
    foreach($order->getPizzas() as $id => $pizza) $total += $pizza->getPrecio();
    return number_format($total, 2) . "€";
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["codigo"])) {
        $code = $_POST["codigo"] ?? null;
        if($code != null) {
            if($order->contains($code)) $order->removePizza($code);
            else $order->addPizza($pizzas[$code]);
        }
    }
    if(isset($_POST["clear-pizzas"])) {
        $order->clearPizzas();
    }
}
$_SESSION["order"] = serialize($order);

include("../Views/home.php");
?>