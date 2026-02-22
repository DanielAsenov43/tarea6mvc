<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/icon.ico" type="image/x-icon">
    <title>Error | Mama John's</title>
    <link rel="stylesheet" href="../Styles/global.css">
    <link rel="stylesheet" href="../Styles/error.css">
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
            <a href="./start_controller.php"><span>Pizzas</span></a>
            <a href="./start_controller.php"><span>Tiendas</span></a>
            <a href="./start_controller.php"><span>Conócenos</span></a>
        </section>
    </header>
    <main>
        <section class="error-container">
            <div class="top">
                <h1>Oops...</h1>
                <img src="../Images/error.png" draggable="false" alt="Error"/>
            </div>
            <div class="bottom">
                <p>Se ha producido un error. Por favor, inténtelo más tarde o contacte a un administrador.</p>
                <p>Información técnica:<br/><b><?php echo $errorInfo; ?></b></p>
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