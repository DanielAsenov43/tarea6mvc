<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resumen | Mama John's</title>
    <link rel="shortcut icon" href="../Images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../Styles/global.css">
    <link rel="stylesheet" href="../Styles/resume.css">
</head>

<body>
    <header>
        <section class="left">
            <a class="logo-wrapper" href="./start_controller.php">
                <img class="logo" draggable="false" src="../Images/logo.png" alt="Logo" />
            </a>
        </section>
        <section class="center">
            <!-- Por ahora vacío -->
        </section>
        <section class="right">
            <a href="./start_controller.php"><span>Inicio</span></a>
            <a href="./home_controller.php"><span>Pizzas</span></a>
            <a href="#"><span>Tiendas</span></a>
            <a href="#"><span>Conócenos</span></a>
        </section>
    </header>
    <main>
        <section class="left">
            <h1>Pizzas Elegidas</h1>
            <div class="pizzas-container">
                <?php
                foreach ($pizzas as $pizza) {
                    ?>
                    <div class="pizza">
                        <img src="../Images/Pizzas/<?php echo $pizza->getFoto(); ?>.png" draggable="false" alt="Pizza" />
                        <div class="info">
                            <h1><?php echo $pizza->getDescripcion(); ?></h1>
                            <h2><?php echo $pizza->getTipo(); ?></h2>
                            <span><?php echo $pizza->getPrecioFormateado(); ?></span>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>
        <section class="right">
            <h1>Detalles de facturación</h1>
            <div class="bill-container">
                <img src="../Images/logo-full.png" draggable="false" alt="Logo" />
                <table class="pizza-table">
                    <tr>
                        <th>UD.</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                    <?php
                    foreach ($pizzas as $pizza) {
                        ?>
                        <tr class="pizza">
                            <td class="amount">1x</td>
                            <td class="name"><?php echo $pizza->getDescripcion(); ?></td>
                            <td class="price"><?php echo $pizza->getPrecioFormateado(); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td class="total" colspan="2">Total:</td>
                        <td class="total"><?php echo getPrecioTotalFormateado(); ?></td>
                    </tr>
                    <tr>
                        <td class="total" colspan="2">Hora de entrega:</td>
                        <td class="total"><?php echo $order->getDeliveryTime(); ?></td>
                    </tr>
                </table>
                <div class="buttons">
                    <a class="button" href="./home_controller.php">← Volver</a>
                    <form id="finish-purchase-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <button class="button" type="submit" name="finish-purchase" id="purchase">Finalizar ✓</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <section class="center">
            <span>Página creada por <b>Daniel</b> y <b>Abel</b></span>
            <span>- Sin ChatGPT -</span>
        </section>
    </footer>
</body>

</html>