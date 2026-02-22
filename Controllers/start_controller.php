<?php
require_once("../Models/DataBase.php");
require_once("../Models/Order.php");

session_start();
if(isset($_SESSION["success"])) {
    echo "<script>alert(\"Compra realizada con éxito\")</script>";
    session_destroy();
}

$billingMethods = [
    "contado" => "Contado",
    "mastercard" => "MasterCard",
    "visa" => "VISA",
    "american-express" => "American Express"
];

function getDeliveryTime(): string {
    return getDeliveryTimeObject()->format("H:i");
}
function getDeliveryTimeObject(): DateTime {
    $extraMinutes = 40;
    $date = new DateTime();
    $date->add(new DateInterval('PT' . ($extraMinutes + 60) . 'M'));
    return $date;
}

function generateBillingMethods(): void {
    global $billingMethods;
    foreach($billingMethods as $key => $value) {
        echo "<option value=$key>$value</option>";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["choose-pizzas"])) {
    session_start();
    
    if(!isset($_SESSION["order"])) $order = new Order();
    else $order = unserialize($_SESSION["order"]);

    if(isset($_POST["billing-method"])) {
        $order->setBillingMethod($_POST["billing-method"]);
    }

    $deliveryTime = getDeliveryTimeObject();
    $order->setDeliveryTime($deliveryTime);
    $_SESSION["order"] = serialize($order);
    header("Location: ./home_controller.php");
}

include("../Views/start.php");
?>