<?php

class Pizza{
    private string $codigo, $descripcion, $tipo, $foto;
    private float $precio;

    public function __construct(Object $PDOPizza) {
        $this->codigo = $PDOPizza->codigo;
        $this->descripcion = $PDOPizza->descripcion;
        $this->precio = $PDOPizza->precio;
        $this->tipo = $PDOPizza->tipo;
        $this->foto = $PDOPizza->foto;
    }

    // Getters
    public function getCodigo(): string { return $this->codigo; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getPrecio(): float { return $this->precio; }
    public function getTipo(): string { return $this->tipo; }
    public function getFoto(): string { return $this->foto; }

    // No necesitamos setters

    // Otras funciones
    public function getPrecioFormateado(): string {
        return number_format($this->precio, 2) . "€";
    }
    public function __tostring(): string {
        return "Pizza($this->codigo, \"$this->descripcion\", \"$this->tipo\", ".$this->getPrecioFormateado().", $this->foto)";
    }
}

?>