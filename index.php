<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos Humanos</title>
    <link rel="stylesheet" href="./views/resources/css/normalize.css">
    <link rel="stylesheet" href="./views/resources/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
</head>

<body>
    <main class="main-container">
        <form method="POST" enctype="multipart/form-data">
            <img src="./views/resources/images/LOGO-ALCALDIA-OCUMARE-BORDE-BLANCO.png" alt="">
            <?php
            include("./config/database.php");
            include("./controllers/iniciar-sesion-controller.php");
            ?>
            <h3>Iniciar sesión</h3>
            <input type="text" name="numero_documento" placeholder="Numero de documento">
            <input type="password" name="contraseña" placeholder="contraseña">
            <input type="submit" value="Entrar" name="btn-entrar">
        </form>
        <footer class="footer">
            <p>Desarrollado por la Dirección de Sistemas y Tecnologías de la Información
                <br>Versión 1.0</p>
        </footer>
        
    </main>
</body>

</html>