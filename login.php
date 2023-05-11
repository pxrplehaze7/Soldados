
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Login - FFAASTATUS</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body class="bodylogin">
    <header>
        <h1>
            <img src="./assets/img/FFAAstatuslogo.png" class="logo" alt="logo">
        </h1>
        <nav>
            <a href="index.html">Inicio</a>
            <a href="contacto.html">Contacto</a>
        </nav>

    </header>
    <div class="centrarlogo">
        <img class="logocentrado" src="./assets/img/FFAAstatuslogo.png" alt="logocentrado">

        
    </div>
    

    <!--Iniciar Sesión-->

    <main class="contenedor-login">
        <fieldset>
                <form action="" class="login" method="post">
                    <?php
                    include("./config/conexion.php");
                    include("./config/controller.php");
                    ?>

                        <br>
                        <label for="email"></label><br>
                        <input type="email" id="email" name="email" placeholder="Correo Electrónico"><br>
            
                        <label for="password"></label><br>
                        <input type="password" id="password" name="password" placeholder="Contraseña"><br><br>
                        
                        <input class="btn-login" type="submit" value="Login" name="ingresar"><br>
                        <a class="forget" href="olvidaste.php">¿Olvidaste tu contraseña?</a>
                        <br><br>
                </form>
        </fieldset>

    </main>


    <footer class="pie">
        <p>Todos los derechos reservados M. Pérez - M. González 2023</p>
    </footer>

</body>

</html>