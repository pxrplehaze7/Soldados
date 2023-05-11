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
    <title>Soldados - FFAASTATUS</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Soldados Registrados</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                    include('./partials/editCombatiente.php')
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Estado</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>DNI / RUN</th>
                                            <th>Edad</th>
                                            <th>F. Nacimiento</th>
                                            <th>País</th>
                                            <th>Rama</th>
                                            <th>Grado</th>
                                            <th>Unidad</th>
                                            <th>Admisión</th>
                                            <th>Muerte</th>
                                            <th>Lugar</th>

                                            <?php if ($id_rol_usuario_actual == 1) { ?>
                                                <td> </td>
                                                <td> </td>
                                            <?php } ?>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php
                                            $sql = "SELECT id_soldier, st.name_status, name_soldier, lastname, age, date_birth, dni, c.name_country, b.name_branches, g.name_grades, unit, date_admission, date_death, place_death
                                            FROM soldier s
                                            INNER JOIN country c ON (c.id_country = s.id_country)
                                            INNER JOIN branches b ON (b.id_branches = s.id_branches)
                                            INNER JOIN grades g ON (g.id_grades = s.id_grades)
                                            INNER JOIN status st ON (st.id_status = s.id_status)";

                                            $result = mysqli_query($conexion, $sql);

                                            while ($mostrar = mysqli_fetch_array($result)) { ?>
                                                <td><?php echo $mostrar['name_status'] ?> </td>
                                                <td><?php echo $mostrar['name_soldier'] ?></td>
                                                <td><?php echo $mostrar['lastname'] ?></td>
                                                <td><?php echo $mostrar['dni'] ?></td>
                                                <td><?php echo $mostrar['age'] ?></td>
                                                <td><?php echo $mostrar['date_birth'] ?></td>
                                                <td><?php echo $mostrar['name_country'] ?></td>
                                                <td><?php echo $mostrar['name_branches'] ?></td>
                                                <td><?php echo $mostrar['name_grades'] ?></td>
                                                <td><?php echo $mostrar['unit'] ?></td>
                                                <td><?php echo $mostrar['date_admission'] ?></td>
                                                <td><?php echo $mostrar['date_death'] ?></td>
                                                <td><?php echo $mostrar['place_death'] ?></td>

                                                <?php if ($id_rol_usuario_actual == 1) { ?>

                                                    <td class="btn-admin"><button type="button" class="btn btn-info editbtn" onclick="busca_soldier(<?php echo $mostrar['id_soldier'] ?>)" data-toggle="modal" data-target="#editarCombatiente"><i class="fa-solid fa-pen-to-square"></i></button> </td>

                                                    <td class="btn-admin"><button type="button" class="btn btn-danger editbtn" data-toggle="modal" data-target="#deleteCombatiente<?php echo $mostrar['id_soldier'] ?>"><i class="fa-solid fa-trash"></i></button>


                                                        <!-- DELETE Modal-->
                                                        <div class="modal fade" id="deleteCombatiente<?php echo $mostrar['id_soldier'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <button class="btn btn-primary" type="submit" data-dismiss="modal" name="eliminarSoldier" onclick="delete_soldier(<?php echo $mostrar['id_soldier'] ?>)">Confirmar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php } ?>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="editarCombatiente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Combatiente</h1>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            <form class="formulario-registro" action="" method="post">

                                                <p class="text-danger">( <span class="obligatorio">* </span>) Campos <strong class="obli"> Obligatorios</strong></p>

                                                <div>
                                                    <input type="hidden" id="input_idSoldier" name="idcombat">
                                                    <div class="form-group">
                                                        <span class="obligatorio">*</span>
                                                        <label for="inputNameSoldier">Nombres</label>
                                                        <input type="text" class="form-control" id="inputNameSoldier" placeholder="" name="namesoldier">
                                                    </div>

                                                    <div class="form-group">
                                                        <span class="obligatorio">*</span>
                                                        <label for="inputLastNameSoldier">Apellidos</label>
                                                        <input type="text" class="form-control" id="inputLastNameSoldier" placeholder="" name="lastnamesoldier">
                                                    </div>

                                                    <div class="form-group">
                                                        <span class="obligatorio">*</span>
                                                        <label for="inputDniSoldier">DNI / RUN</label>
                                                        <input type="text" class="form-control" id="inputDniSoldier" placeholder="" name="dnisoldier">
                                                    </div>

                                                    <div class="form-group">
                                                        <span class="obligatorio">*</span>
                                                        <label for="inputEdad">Edad</label>
                                                        <input type="number" class="form-control" id="inputEdad" placeholder="" name="edad" ">
                                                    </div>

                                                    <div class=" form-group">
                                                        <span class="obligatorio">*</span>
                                                        <label for="inputNac">Fecha de Nacimiento</label>
                                                        <input type="date" class="form-control" id="inputNac" placeholder="" name="nacimiento">
                                                    </div>

                                                    <div class="form-group">
                                                        <span class="obligatorio">*</span>
                                                        <label for="inputCountrySoldier">País</label>
                                                        <?php
                                                        $query2 = "SELECT id_country,name_country FROM country";
                                                        $result2 = mysqli_query($conexion, $query2);

                                                        // verificar si hay resultados
                                                        if (mysqli_num_rows($result2) > 0) {
                                                            // recorrer los resultados y generar una lista de opciones para el elemento select
                                                            echo "<select  id='inputCountrySoldier' class='form-control' name='pais'>";
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
                                                        $query3 = "SELECT id_branches,name_branches FROM branches";
                                                        $result3 = mysqli_query($conexion, $query3);

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

                                                        $query4 = "SELECT id_grades,name_grades FROM grades ";
                                                        $result4 = mysqli_query($conexion, $query4);

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
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <span class="obligatorio">*</span>
                                                        <label for="inputStatus">Estado</label>
                                                        <?php
                                                        $sql_estado = "SELECT id_status,name_status FROM status";
                                                        $result5 = mysqli_query($conexion, $sql_estado);

                                                        // verificar si hay resultados
                                                        if (mysqli_num_rows($result5) > 0) {
                                                            // recorrer los resultados y generar una lista de opciones para el elemento select
                                                            echo "<select  id='inputStatus' class='form-control' name='estado'>";
                                                            echo "<option hidden='hidden' disabled selected>--- Seleccione ---</option>";
                                                            while ($row = mysqli_fetch_assoc($result5)) {
                                                                echo "<option value='" . $row['id_status'] . "'>" . $row['name_status'] . "</option>";
                                                            }
                                                            echo "</select>";
                                                        } else {
                                                            // si no hay resultados, mostrar un mensaje
                                                            echo "No hay estados disponibles";
                                                        } ?>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="inputUnit">Unidad</label>
                                                        <input type="text" class="form-control" id="inputUnit" placeholder="" name="unidad">
                                                    </div>

                                                    <div class="form-group ">
                                                        <span class="obligatorio">*</span>
                                                        <label for="inputAdmision">Fecha de Admisión</label>
                                                        <input type="date" class="form-control" id="inputAdmision" placeholder="" name="admision">
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="inputDeath">Fecha de Muerte</label>
                                                        <input type="date" class="form-control" id="inputDeath" placeholder="" name="muerte">
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="inputLugar">Lugar de Muerte</label>
                                                        <input type="text" class="form-control" id="inputLugar" placeholder="" name="lugar">
                                                    </div>

                                                    <div class="contenedor-botones modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                        <input class="btn-registrar d-inline-block " type="submit" value="Actualizar" name="actualizarSoldier">
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
            <?php require('./partials/footer.html') ?>
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
    <script src="./scripts/datatables/customSoldier.js"></script>

</body>

</html>