<?php
class Order {
    private array $pizzas;
    private string $billingMethod;
    private DateTime $deliveryTime;

    public function __construct() {
        $this->pizzas = array();
    }

    // Getters
    public function getPizzas(): array {
        return $this->pizzas;
    }
    public function getBillingMethod(): string {
        return $this->billingMethod;
    }
    public function getDeliveryTime(): string {
        return $this->deliveryTime->format("H:i");
    }
    public function getDeliveryTimeObject(): DateTime {
        return $this->deliveryTime;
    }

    // Setters
    public function setBillingMethod(string $billingMethod): void {
        $this->billingMethod = $billingMethod;
    }
    public function setDeliveryTime(DateTime $deliveryTime): void {
        $this->deliveryTime = $deliveryTime;
    }


    public function addPizza(Pizza $pizza): void {
        $this->pizzas[$pizza->getCodigo()] = $pizza;
    }

    public function removePizza(string $code): void {
        unset($this->pizzas[$code]);
    }

    public function contains(string $code): bool {
        return array_key_exists($code, $this->pizzas);
    }
    public function clearPizzas(): void {
        $this->pizzas = array();
    }

    public function isEmpty(): bool {
        return empty($this->pizzas);
    }

    public function __tostring(): string {
        $string = "";
        foreach($this->pizzas as $pizza) $string .= $pizza . "<br/>";
        return $string;
    }
}
?>