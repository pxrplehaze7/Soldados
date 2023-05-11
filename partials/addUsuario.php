<?php
include("../config/conexion.php");


if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


$valida_correo = $_POST["emailuser"];
$sql_correo = "SELECT * FROM user WHERE email = '$valida_correo'";
$n_correos = mysqli_query($conexion, $sql_correo);

$valida_dni = $_POST["dniuser"];
$sql_dni = "SELECT * FROM user WHERE dni = '$valida_dni'";
$n_dni = mysqli_query($conexion, $sql_dni);

//if(!empty($_POST["registrar"])){

if (empty($_POST["nameuser"]) or empty($_POST["lastnameuser"]) or empty($_POST["dniuser"]) or empty($_POST["emailuser"]) or empty($_POST["passworduser"]) or empty($_POST["rol"]) or empty($_POST["pais"]) or empty($_POST["rama"]) or empty($_POST["grado"])) {
    echo '<div id="mensaje" class="alert alert-warning">Campos vacíos</div>';
    echo "<script>
        setTimeout(function() {
        document.getElementById('mensaje').style.display = 'none';
        }, 3000); // Ocultar mensaje después de 3 segundos
        </script>";
} else {

    if (mysqli_num_rows($n_correos) > 0) {
        echo '<div id="mensaje2" class="alert alert-warning">Correo Electrónico en uso </div>';
        echo "<script>
        setTimeout(function() {
        document.getElementById('mensaje2').style.display = 'none';
        }, 3000); // Ocultar mensaje después de 3 segundos
        </script>";
    }

    if (mysqli_num_rows($n_dni) > 0) {
        echo '<div id="mensaje3" class="alert alert-warning">Usuario ya registrado</div>';
        echo "<script>
        setTimeout(function() {
        document.getElementById('mensaje3').style.display = 'none';
        }, 3000); // Ocultar mensaje después de 3 segundos
        </script>";
    }



    if ((mysqli_num_rows($n_dni) == 0) && (mysqli_num_rows($n_correos) == 0)) {
        $passworduser = ($_POST["passworduser"]);
        $hash = password_hash($passworduser, PASSWORD_DEFAULT);
        $nameuser = $_POST["nameuser"];
        $lastnameuser = $_POST["lastnameuser"];
        $dniuser = $_POST["dniuser"];
        $emailuser = $_POST["emailuser"];
        $id_rol = $_POST["rol"];
        $id_country = $_POST["pais"];
        $id_branches = $_POST["rama"];
        $id_grades = $_POST["grado"];


        $sql = $conexion->query(" INSERT INTO user(username, userlastname, dni, email, password, id_rol, id_country, id_branches, id_grades) VALUES ('$nameuser', '$lastnameuser', '$dniuser', '$emailuser','$hash', '$id_rol', '$id_country', '$id_branches', '$id_grades') ");

        if ($sql == true) {
            // El usuario se ha insertado correctamente en la tabla users
            echo '<div id="mensaje4" class="alert alert-success" role="alert">El usuario se ha registrado correctamente.</div>';
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje4').style.display = 'none';
            }, 3000); // Ocultar mensaje después de 3 segundos
            </script>";
        } else {
            // Hubo un error al insertar el usuario en la tabla users
            echo '<div id="mensaje5" class="alert alert-danger" role="alert">Error: No se pudo registrar el usuario.</div>';
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje5').style.display = 'none';
            }, 3000); // Ocultar mensaje después de 3 segundos
            </script>";
        }
    }
}
//}
