<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pizzas | Mama John's</title>
    <link rel="shortcut icon" href="../Images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../Styles/global.css">
    <link rel="stylesheet" href="../Styles/home.css">
    <script src="../Scripts/home.js"></script>
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
            <a href="#"><span>Pizzas</span></a>
            <a href="#"><span>Tiendas</span></a>
            <a href="#"><span>Conócenos</span></a>
        </section>
    </header>
    <main>
        <section class="left">
            <h1>Nuestras pizzas</h1>
            <?php
            foreach (getPizzaCategories() as $category) {
                ?>
                <div class="category">
                    <h1><?php echo $category; ?></h1>
                    <hr />
                    <div class="category-content">
                        <?php
                        foreach (getPizzasByCategory($category) as $pizza) {
                            ?>
                            <form class="pizza-form <?php if ($order->contains($pizza->getCodigo()))
                                echo "selected"; ?>" action="../Controllers/home_controller.php" method="post">
                                <img src="../Images/Pizzas/<?php echo $pizza->getFoto() ?>.png" alt="pizza" draggable="false" />
                                <div class="pizza-info">
                                    <span class="description"><?php echo $pizza->getDescripcion(); ?></span>
                                    <span class="price"><?php echo $pizza->getPrecioFormateado(); ?></span>
                                </div>
                                <input type="hidden" name="codigo" value="<?php echo $pizza->getCodigo(); ?>">
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </section>
        <section class="right">
            <div class="order-container">
                <h1>Cesta de la compra</h1>
                <ul class="order">
                    <?php
                    foreach (getPizzasInOrder() as $id => $pizza) {
                        //for($i = 0; $i < 5; $i++) { // Debug
                        ?>
                        <li>
                            <div class="order-pizza">
                                <img src="../Images/Pizzas/<?php echo $pizza->getFoto(); ?>.png" draggable="false"
                                    alt="Pizza">
                                <h1><?php echo $pizza->getDescripcion(); ?></h1>
                                <span><?php echo $pizza->getPrecioFormateado(); ?></span>
                            </div>
                        </li>
                        <?php
                        //}
                    }
                    if(noPizzasSelected()) {
                        ?>
                        <span class="no-pizzas">No se han elegido pizzas. Elige al menos una pizza para continuar.</span>
                        <?php
                    }
                    ?>
                </ul>
                <div class="bottom-info">
                    <p class="total">Total: <span><?php echo getPrecioTotalFormateado(); ?></span></p>
                    <div class="buttons">
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                            <a class="button" href="../Controllers/start_controller.php">Volver</a>
                            <button class="button" type="submit" name="clear-pizzas">Limpiar</button>
                            <a class="button" href="../Controllers/resume_controller.php">Continuar</a>
                        </form>
                    </div>
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