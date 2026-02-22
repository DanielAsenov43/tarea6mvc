<?php
require_once("../Models/DataBase.php");
require_once("../Models/Pizza.php");
require_once("../Models/Order.php");

session_start();


if (!isset($_SESSION["order"])) {
    header("Location: start_controller.php");
    exit();
}

$order = unserialize($_SESSION["order"]);
$pizzas = getPizzasInOrder();

if($order->isEmpty()) {
    header("Location: ./home_controller.php");
    exit();
}

function getPizzasInOrder(): array {
    global $order;
    return $order->getPizzas();
}

function getPrecioTotal(): float {
    global $order;
    $total = 0;
    foreach($order->getPizzas() as $pizza) {
        $total += $pizza->getPrecio();
    }
    return $total;
}
function getPrecioTotalFormateado(): string {
    $total = getPrecioTotal();
    return number_format($total, 2) . "€";
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["finish-purchase"])) {
    $connection = new DataBase();
    $billingMethod = $order->getBillingMethod();
    $deliveryTime = $order->getDeliveryTimeObject();
    $total = getPrecioTotal();
    $orderPizzas = $order->getPizzas();
    $connection->saveOrder($billingMethod, $deliveryTime, $total, $orderPizzas);
    $_SESSION["success"] = true;
    header("Location: ./start_controller.php");
    exit();
}

include("../Views/resume.php");
?>