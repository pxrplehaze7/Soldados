<?php

if(!empty($_POST["ingresar"])){

    $email = htmlspecialchars($_POST["email"]); // sanitizacion de datos
    $password = htmlspecialchars($_POST["password"]); 

    if (empty($_POST["email"]) and empty($_POST["password"])) {
        echo "<span id='mensaje1' style='color: white; transition: all 0.5s ease; font-size: 15px; background-color:  #e4446b; opacity: 0.8;  padding: 1rem; border-radius: .5rem;'>Los campos estan vacíos</span>";
        echo "<script>
        setTimeout(function() {
        document.getElementById('mensaje1').style.display = 'none';
        }, 3000); // Ocultar mensaje después de 3 segundos
        </script>";

    } else {
        $email_input=$_POST["email"];
        $password_input=$_POST["password"];

        $sql="SELECT * FROM user where email='$email_input' ";

        $result = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_array($result);
        if ((password_verify($password_input,$mostrar['password'])) ) {
            //iniciar variables de sesion
            session_start();
            $_SESSION['id_user']=$mostrar['id_user'];
            header("location:./home.php");
        } else {
            echo "<span id='mensaje2'style='color: white;  transition: all 0.5s ease;  font-size: 15px; background-color:  #e4446b; opacity: 0.8; padding: 1rem; border-radius: .5rem;'>Usuario o contraseña incorrectos</span>";
            
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje2').style.display = 'none';
            }, 3000); // Ocultar mensaje después de 3 segundos
            </script>";
        }
        

    }
    
}


?>