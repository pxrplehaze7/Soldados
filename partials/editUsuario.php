<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    include("./config/conexion.php");
    require("./config/session.php");


    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    
    if(!empty($_POST["actualizar"])){

        if (empty($_POST["nameuser"]) or empty($_POST["lastnameuser"]) or empty($_POST["dniuser"])or empty($_POST["emailuser"]) or empty($_POST["pais"]) or empty($_POST["rama"]) or empty($_POST["grado"])) {
            echo '<div id="mensaje" class="alert alert-warning">Campos vacíos</div>';
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje').style.display = 'none';
            }, 3000); // Ocultar mensaje después de 3 segundos
            </script>";
        } else {

            
            
            $id_user=$_POST["idusuario"];
            $nameuser=$_POST["nameuser"];
            $lastnameuser=$_POST["lastnameuser"];
            $dniuser=$_POST["dniuser"];
            $emailuser=$_POST["emailuser"];
            $id_country=$_POST["pais"];
            $id_branches=$_POST["rama"];
            $id_grades=$_POST["grado"];
            

            $sql= "UPDATE user SET username='$nameuser', userlastname='$lastnameuser', dni='$dniuser', email='$emailuser',  id_country='$id_country', id_branches='$id_branches', id_grades='$id_grades' WHERE id_user = $id_user";

            $sql=$conexion->query($sql);
            if ($sql==true) {
                
                // El usuario se ha insertado correctamente en la tabla users
                echo '<div id="mensaje" class="alert alert-success" role="alert">El usuario se ha actualizado correctamente.</div>';
                echo "<script>
                setTimeout(function() {
                document.getElementById('mensaje').style.display = 'none';
                }, 3000); // Ocultar mensaje después de 3 segundos
                </script>";
            } else {
                // Hubo un error al insertar el usuario en la tabla users
                echo '<div id="mensaje" class="alert alert-danger" role="alert">Error: No se pudo actualizar el usuario.</div>';
                echo "<script>
                setTimeout(function() {
                document.getElementById('mensaje').style.display = 'none';
                }, 3000); // Ocultar mensaje después de 3 segundos
                </script>";
            }
    
    
        }
        
    }
    
    ?>