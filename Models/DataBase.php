<?php
require_once("../Config/config.php");

error_reporting(E_ERROR);
class DataBase
{

    private PDO $connection;

    public function getConnection(): PDO|null
    {
        session_start();
        if (!isset($this->connection)) {
            try {
                $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, $options);
            } catch (PDOException $exception) {
                $this->handleError($exception->getCode());
            }
        }
        return $this->connection;
    }

    public function select(string $query, int $mode = PDO::FETCH_OBJ): array
    {
        $connection = $this->getConnection();
        $objects = array();
        try {
            $result = $connection->query($query);
            while ($row = $result->fetch($mode)) {
                $objects[] = $row;
            }
        } catch (PDOException $exception) {
            $this->handleError($exception->getCode());
        }
        return $objects;
    }

    public function update(string $query): void { // Tira un error, atrapar con try-catch
        $connection = $this->getConnection();
        $connection->exec($query);
    }

    public function getPizzas(): array
    {
        $pizzas = array();
        $PDOPizzas = $this->select("SELECT * FROM pizza");
        foreach ($PDOPizzas as $PDOPizza) {
            $pizzas[$PDOPizza->codigo] = new Pizza($PDOPizza);
        }
        return $pizzas;
    }

    public function saveOrder(string $billingMethod, DateTime $deliveryTime, float $total, array $pizzas): void {
        require_once("../Models/Pizza.php");
        $orderID = $this->generateOrderID();
        $connection = $this->getConnection();

        $connection->beginTransaction();

        try {
            $time = $deliveryTime->format("H:i:s");
            $orderQuery = "INSERT INTO pedido (numero, f_pago, fecha, importe) VALUES ($orderID, \"$billingMethod\", \"$time\", $total)";
            $this->update($orderQuery);
            
            $pizzasQuery = "INSERT INTO detalle (id_pedido, id_pizza) VALUES ";
            foreach($pizzas as $code => $pizza) {
                $pizzasQuery .= "($orderID, \"$code\"), ";
            }
            // Quitamos la coma final para que la consulta funcione
            $pizzasQuery = substr($pizzasQuery, 0, strlen($pizzasQuery) - 2);
            $this->update($pizzasQuery);
        } catch (PDOException $exception) {
            $connection->rollBack();
        }
        $connection->commit();
    }

    
    private function generateOrderID(): int|null {
        try {
            $query = "SELECT COUNT(numero) as id FROM pedido";
            $result = $this->getConnection()->query($query);
            while($row = $result->fetch(PDO::FETCH_OBJ)) {
                $lastID = $row->id;
            }
            return $lastID + 1;
        } catch(PDOException $exception) {
            $this->handleError($exception->getCode());
            exit();
        }
    }

    private function handleError(string $codeString): void
    {
        $code = intval($codeString);
        switch ($code) {
            case 1045:
                $_SESSION["error"] = "Acceso denegado a la base de datos";
                break;

            case 42:
                $_SESSION["error"] = "Error al obtener las pizzas (consulta)";
                break;

            default:
                $_SESSION["error"] = "Código del error: $code";
                break;
        }

        header("Location: ./error_controller.php");
        exit();
    }
}
?>