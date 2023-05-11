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
    <title>Usuarios - FFAASTATUS</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="./styles/sb-admin-2.min.css" rel="stylesheet">
    <link href="./styles/app.css" rel="stylesheet">
    <link href="./styles/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/d78cf7985a.js" crossorigin="anonymous"></script>
    <script src="./scripts/funciones.js"></script>



</head>

<body id="page-top">
    <div id="wrapper">
        <?php require('./partials/menu.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require('./partials/toolbar.php') ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Usuarios Registrados</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>

                        
                        <div class="card-body" id="lista-btn">
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                    include('./partials/editUsuario.php')
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>DNI / RUN</th>
                                            <th>Rol</th>
                                            <th>País</th>
                                            <th>Rama</th>
                                            <th>Rango</th>
                                            <th>Correo</th>
                                            <?php if ($id_rol_usuario_actual == 1) { ?>
                                                <td></td>
                                                <td></td>
                                            <?php } ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php
                                            $sql = "SELECT id_user, username, userlastname, dni, 
                                            r.name_rol, c.name_country, b.name_branches, g.name_grades, email     
                                                FROM user u
                                                INNER JOIN country c ON (u.id_country = c.id_country)
                                                INNER JOIN branches b ON (u.id_branches = b.id_branches)
                                                INNER JOIN rol r ON (u.id_rol = r.id_rol)
                                                INNER JOIN grades g ON (u.id_grades = g.id_grades)";

                                            $result = mysqli_query($conexion, $sql);

                                            while ($mostrar = mysqli_fetch_array($result)) { ?>
                                                <td><?php echo $mostrar['username'] ?> </td>
                                                <td><?php echo $mostrar['userlastname'] ?></td>
                                                <td><?php echo $mostrar['dni'] ?></td>
                                                <td><?php echo $mostrar['name_rol'] ?></td>
                                                <td><?php echo $mostrar['name_country'] ?></td>
                                                <td><?php echo $mostrar['name_branches'] ?></td>
                                                <td><?php echo $mostrar['name_grades'] ?></td>
                                                <td><?php echo $mostrar['email'] ?></td>
                                                
                                                <?php if ($id_rol_usuario_actual == 1) { ?>

                                                    <td  class="btn-admin"><button <?php if ($mostrar['id_user']==$id_del_usuario){?>hidden="hidden" <?php }?> type="button" class="btn btn-info editbtn" onclick="busca_user(<?php echo $mostrar['id_user'] ?>)" data-toggle="modal" data-target="#editar"><i class="fa-solid fa-pen-to-square"></i></button></td>

                                                    <td class="btn-admin"><button <?php if ($mostrar['id_user']==$id_del_usuario){?>hidden="hidden" <?php }?> type="button" class="btn btn-danger editbtn" data-toggle="modal" data-target="#deleteUsuario<?php echo $mostrar['id_user']?>"><i class="fa-solid fa-trash"></i></button>

                                                        <!-- DELETE Modal-->
                                                        <div class="modal fade" id="deleteUsuario<?php echo $mostrar['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">¿Esta seguro?</div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                        <button class="btn btn-primary" type="submit" data-dismiss="modal" name="eliminarUser" onclick="delete_user(<?php echo $mostrar['id_user'] ?>)">Confirmar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </td>

                                                <?php } ?>



                                        </tr>
                                    <?php  } ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form class="formulario-registro" action="" method="post">
                                                <div>
                                                    <input type="text" id="inputIDUser" name="idusuario">
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
                                                            echo "<select  id='inputCountryUser' class='form-control' name='pais'>";
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

                                                    <div class="contenedor-botones modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                        <input class="btn-registrar d-inline-block " type="submit" value="Actualizar" name="actualizar">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <?php require ('./partials/footer.html')?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js" integrity="sha512-+QnjQxxaOpoJ+AAeNgvVatHiUWEDbvHja9l46BHhmzvP0blLTXC4LsvwDVeNhGgqqGQYBQLFhdKFyjzPX6HGmw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="./scripts/datatables/dataTables.min.js"></script>
    <script src="./scripts/datatables/pdfmake.min.js"></script>
    <script src="./scripts/datatables/vfs_fonts.js"></script>
    <script src="./scripts/datatables/customUser.js"></script>

</body>

</html>