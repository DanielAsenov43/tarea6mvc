<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio | Mama John's</title>
    <link rel="shortcut icon" href="../Images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../Styles/global.css">
    <link rel="stylesheet" href="../Styles/start.css">
    <script src="../Scripts/start.js"></script>
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
            <a href="#"><span>Inicio</span></a>
            <a href="#"><span>Pizzas</span></a>
            <a href="#"><span>Tiendas</span></a>
            <a href="#"><span>Conócenos</span></a>
        </section>
    </header>
    <main>
        <section class="banner">
            <div class="title">
                <h2>Mama</h2>
                <h1>Johns</h1>
            </div>
            <div class="carousel">
                <div class="wrapper">
                    <a href="./start_controller.php" draggable="false" class="carousel-element">
                        <img src="../Images/carousel-1.png" draggable="false" alt="Pizza 1" />
                    </a>
                    <a href="./start_controller.php" draggable="false" class="carousel-element">
                        <img src="../Images/carousel-2.png" draggable="false" alt="Pizza 2" />
                    </a>
                    <a href="./start_controller.php" draggable="false" class="carousel-element">
                        <img src="../Images/carousel-3.png" draggable="false" alt="Pizza 3" />
                    </a>
                    <a href="./start_controller.php" draggable="false" class="carousel-element">
                        <img src="../Images/carousel-4.png" draggable="false" alt="Pizza 2" />
                    </a>
                </div>
                <div class="wrapper"> <!-- Copia para que el carrusel funcione -->
                    <a href="./start_controller.php" draggable="false" class="carousel-element">
                        <img src="../Images/carousel-1.png" draggable="false" alt="Pizza 1" />
                    </a>
                    <a href="./start_controller.php" draggable="false" class="carousel-element">
                        <img src="../Images/carousel-2.png" draggable="false" alt="Pizza 2" />
                    </a>
                    <a href="./start_controller.php" draggable="false" class="carousel-element">
                        <img src="../Images/carousel-3.png" draggable="false" alt="Pizza 3" />
                    </a>
                    <a href="./start_controller.php" draggable="false" class="carousel-element">
                        <img src="../Images/carousel-4.png" draggable="false" alt="Pizza 2" />
                    </a>
                </div>
            </div>
        </section>
        <section class="content">
            <img src="../Images/content-background.webp" alt="Fondo" id="content-background">
            <form action="start_controller.php" method="post">

                <!-- Recordatorio: Nos dijiste en clase que no era necesario pedir el Nº de consumiciones -->
                
                <div class="left">
                    <div class="card">
                        <h1>Selección del pedido</h1>
                        <div>
                            <label for="billing-method">Elegir método de pago</label>
                            <select name="billing-method" required>
                                <?php generateBillingMethods(); ?>
                            </select>
                        </div>
                        <div>
                            <span class="label">Hora de entrega:</span>
                            <span class="time">
                                <?php echo getDeliveryTime(); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="choose-pizzas">
                <div class="right" id="submit-form">
                    <span>Continuar →</span>
                </div>
            </form>
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