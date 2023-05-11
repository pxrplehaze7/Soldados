<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', '1');

    include("./config/conexion.php");


    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    if(!empty($_POST["actualizarSoldier"])){

        if (empty($_POST["namesoldier"]) or empty($_POST["lastnamesoldier"]) or empty($_POST["dnisoldier"])or empty($_POST["edad"]) or empty($_POST["nacimiento"]) or empty($_POST["pais"]) or empty($_POST["rama"]) or empty($_POST["grado"]) or empty($_POST["estado"]) or empty($_POST["admision"])) {
            echo '<div id="mensaje" class="alert alert-warning">Campos vacios</div>';
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje').style.display = 'none';
            }, 3000); // Ocultar mensaje después de 3 segundos
            </script>";

        } else {
        $id_soldier=$_POST["idcombat"];
        $status=$_POST["estado"];
        $namesoldier=$_POST["namesoldier"];
        $lastnamesoldier=$_POST["lastnamesoldier"];
        $dnisoldier=$_POST["dnisoldier"];
        $edadsoldier=$_POST["edad"];
        $nacsoldier= ($_POST["nacimiento"]);
        $id_country=$_POST["pais"];
        $id_branches=$_POST["rama"];
        $id_grades=$_POST["grado"];
        $unidad=$_POST["unidad"];
        $admision=$_POST["admision"];
        $muerte=$_POST["muerte"];
        $lugar=$_POST["lugar"];
            
    
        
    

            $sql="UPDATE soldier SET id_status='$status',name_soldier='$namesoldier', lastname='$lastnamesoldier', age='$edadsoldier', date_birth='$nacsoldier',dni='$dnisoldier',  id_country='$id_country', id_branches='$id_branches', id_grades='$id_grades', unit='$unidad', date_admission='$admision', date_death='$muerte', place_death='$lugar' WHERE id_soldier = $id_soldier";

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