<?php
require("./config/conexion.php");
require("./config/session.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrar Usuario - FFAASTATUS</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/d78cf7985a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="./styles/app.css">
    <link href="./styles/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./scripts/funciones.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        require('./partials/menu.php')
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require('./partials/toolbar.php') ?>
                <!-- Comienzo del formulario para registrar usuarios -->
                <div class="container-registro">
                    <fieldset class="almacen-registro">
                        <h1 class="h3">Registro de usuarios</h1>

                        <form class="formulario-registro" id="form-reg" action="" method="post">
                            
                            <p class="text-danger">( <span class="obligatorio">* </span>) Campos <strong class="obli"> Obligatorios</strong></p>

                            <div id="respuesta"></div>
                            <div class="container-g">

                                <div class="container-ch">

                                        <div class="form-group">
                                            <span class="obligatorio">*</span>
                                            <label for="inputNameUser">Nombres</label>
                                            <input type="text" class="form-control" id="inputNameUser" placeholder="" name="nameuser">
                                        </div>

                                        <div class="form-group">
                                            <span class="obligatorio">*</span>
                                            <label for="inputLastNameUser">Apellidos</label>
                                            <input type="text" class="form-control" id="inputLastNameUser" placeholder="" name="lastnameuser">
                                        </div>

                                        <div class="form-group">
                                            <span class="obligatorio">*</span>
                                            <label for="inputDniUser">DNI / RUN</label>
                                            <input type="text" class="form-control" id="inputDniUser" placeholder="" name="dniuser">
                                        </div>

                                        <div class="form-group ">
                                            <span class="obligatorio">*</span>
                                            <label for="inputEmailUser">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="inputEmailUser" placeholder="" name="emailuser" autocomplete="off">
                                        </div>

                                        <div class="form-group ">
                                            <span class="obligatorio">*</span>
                                            <label for="inputPasswordUser">Contraseña</label>
                                            <input type="password" class="form-control" id="inputPasswordUser" placeholder="" name="passworduser" autocomplete="off">
                                        </div>
                                        
                                </div>


                                <div class="container-ch">

                                        <div class="form-group ">
                                            <span class="obligatorio">*</span>
                                            <label for="inputRoleUser">Rol</label>
                                            <?php
                                            $sql_rol_u = "SELECT id_rol,name_rol FROM rol";
                                            $result1 = mysqli_query($conexion, $sql_rol_u);

                                            // verificar si hay resultados
                                            if (mysqli_num_rows($result1) > 0) {
                                                // generar el elemento select
                                                echo "<select id='inputRoleUser' class='form-control' name='rol'>";
                                                echo "<option hidden='hidden' disabled selected>--- Seleccione ---</option>";

                                                // recorrer los resultados y generar las opciones del elemento select
                                                while ($row = mysqli_fetch_assoc($result1)) {
                                                    echo "<option value='" . $row['id_rol'] . "'>" . $row['name_rol'] . "</option>";
                                                }
                                                echo "</select>";
                                            } else {
                                                // si no hay resultados, mostrar un mensaje
                                                echo "No hay roles disponibles";
                                            } ?>
                                        </div>

                                        <div class="form-group">
                                            <span class="obligatorio">*</span>
                                            <label for="inputCountryUser">País</label>
                                            <?php
                                            $sql_country_u = "SELECT id_country,name_country FROM country";
                                            $result2 = mysqli_query($conexion, $sql_country_u);

                                            // verificar si hay resultados
                                            if (mysqli_num_rows($result2) > 0) {
                                                // recorrer los resultados y generar una lista de opciones para el elemento select
                                                echo "<select  id='inputCountry' class='form-control' name='pais'>";
                                                echo "<option hidden='hidden' disabled selected>--- Seleccione ---</option>";
                                                while ($row = mysqli_fetch_assoc($result2)) {
                                                    echo "<option value='" . $row['id_country'] . "'>" . $row['name_country'] . "</option>";
                                                }
                                                echo "</select>";
                                            } else {
                                                // si no hay resultados, mostrar un mensaje
                                                echo "No hay países disponibles";
                                            } ?>
                                        </div>

                                        <div class="form-group">
                                            <span class="obligatorio">*</span>
                                            <label for="inputBranche">Rama</label>
                                            <?php
                                            $sql_branches_u = "SELECT id_branches,name_branches FROM branches";
                                            $result3 = mysqli_query($conexion, $sql_branches_u);

                                            // verificar si hay resultados
                                            if (mysqli_num_rows($result3) > 0) {
                                                // generar el elemento select
                                                echo "<select id='inputBranche' class='form-control' name='rama' onchange='rango_rama(this,\"inputGrade\")'>";
                                                echo "<option hidden='hidden' disabled selected>--- Seleccione ---</option>";
                                                // recorrer los resultados y generar las opciones del elemento select
                                                while ($row = mysqli_fetch_assoc($result3)) {
                                                    echo "<option value='" . $row['id_branches'] . "'>" . $row['name_branches'] . "</option>";
                                                }
                                                echo "</select>";
                                            } else {
                                                // si no hay resultados, mostrar un mensaje
                                                echo "No hay ramas disponibles";
                                            } ?>
                                        </div>

                                        <div class="form-group">
                                            <span class="obligatorio">*</span>
                                            <label for="inputGrade">Grado</label>
                                            <?php
                                            $sql_grades_u = "SELECT id_grades,name_grades FROM grades ";
                                            $result4 = mysqli_query($conexion, $sql_grades_u);

                                            // verificar si hay resultados
                                            if (mysqli_num_rows($result4) > 0) {
                                                // generar el elemento select
                                                echo "<select id='inputGrade' class='form-control' name='grado'>";
                                                echo "<option hidden='hidden' disabled selected>--- Seleccione ---</option>";
                                                // recorrer los resultados y generar las opciones del elemento select
                                                while ($row = mysqli_fetch_assoc($result4)) {
                                                    echo "<option value='" . $row['id_grades'] . "'>" . $row['name_grades'] . "</option>";
                                                }
                                                echo "</select>";
                                            } else {
                                                // si no hay resultados, mostrar un mensaje
                                                echo "No hay grados disponibles";
                                            } ?>
                                        </div>

                                </div>

                            </div>

                            <div class="contenedor-botones">
                                <input class="btn-registrar d-inline-block " type="button" onclick="registra_usuario()" value="Registrar" name="registrar">
                                <input class="btn-borrar d-inline-block " type="reset" value="Limpiar" name="limpiarregistro">
                            </div>


                        </form>
                    </fieldset>
                </div>
            </div>
            <?php require('./partials/footer.html') ?>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js" integrity="sha512-+QnjQxxaOpoJ+AAeNgvVatHiUWEDbvHja9l46BHhmzvP0blLTXC4LsvwDVeNhGgqqGQYBQLFhdKFyjzPX6HGmw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>