<?php
include("../config/conexion.php");


if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$valida_dni = $_POST["dnisoldier"];
$sql_dni = "SELECT * FROM soldier WHERE dni = '$valida_dni'";
$n_dni = mysqli_query($conexion, $sql_dni);


    if (empty($_POST["namesoldier"]) or empty($_POST["lastnamesoldier"]) or empty($_POST["dnisoldier"])or empty($_POST["edadsoldier"]) or empty($_POST["nacimiento"]) or empty($_POST["pais"]) or empty($_POST["rama"]) or empty($_POST["grado"]) or empty($_POST["estado"]) or empty($_POST["admision"])) {
        echo '<div id="mensaje1" class="alert alert-warning">Campos vacíos</div>';
        echo "<script>
        setTimeout(function() {
        document.getElementById('mensaje1').style.display = 'none';
        }, 3000); // Ocultar mensaje después de 3 segundos
        </script>";

    } else {


        if (mysqli_num_rows($n_dni) > 0) {
            echo '<div id="mensaje2" class="alert alert-warning">Usuario ya registrado</div>';
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje2').style.display = 'none';
            }, 3000); // Ocultar mensaje después de 3 segundos
            </script>";
        }

        else {

        $status=$_POST["estado"];
        $namesoldier=$_POST["namesoldier"];
        $lastnamesoldier=$_POST["lastnamesoldier"];
        $dnisoldier=$_POST["dnisoldier"];
        $edadsoldier=$_POST["edadsoldier"];
        $nacsoldier= ($_POST["nacimiento"]);
        $id_country_s=$_POST["pais"];
        $id_branches_s=$_POST["rama"];
        $id_grades_s=$_POST["grado"];
        $unidad=$_POST["unidad"];
        $admision=$_POST["admision"];
        $muerte=$_POST["muerte"];
        $lugar=$_POST["lugar"];

        

        $sql=$conexion->query(" INSERT INTO soldier (id_status, name_soldier, lastname, age, date_birth, dni, id_country, id_branches, id_grades, unit, date_admission, date_death, place_death) VALUES ('$status','$namesoldier', '$lastnamesoldier', '$edadsoldier','$nacsoldier','$dnisoldier', '$id_country_s', '$id_branches_s', '$id_grades_s','$unidad', '$admision', '$muerte', '$lugar') ");

        if ($sql==true) {
            // El usuario se ha insertado correctamente en la tabla users
            echo '<div id="mensaje3" class="alert alert-success" role="alert">El usuario se ha registrado correctamente.</div>';
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje3').style.display = 'none';
            }, 3000); // Ocultar mensaje después de 3 segundos
            </script>";
        } else {
            // Hubo un error al insertar el usuario en la tabla users
            echo '<div id="mensaje4" class="alert alert-danger" role="alert">Error: No se pudo registrar el usuario.</div>';
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje4').style.display = 'none';
            }, 3000); // Ocultar mensaje después de 3 segundos
            </script>";
        }


    }
}


?>