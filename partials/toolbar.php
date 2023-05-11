<?php





$sqlperfil = "SELECT * FROM user WHERE id_user = $id_del_usuario";
$result = mysqli_query($conexion, $sqlperfil);
$mostrar = mysqli_fetch_array($result);
$id_rol_usuario_actual = $mostrar['id_rol'];
include('./partials/editUsuario.php');

?>


<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $mostrar['username'] . " " . $mostrar['userlastname']; ?></span>
                <img class="img-profile rounded-circle" src="./assets/img/undraw/undraw_profile.svg">
            </a>
        
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" onclick="busca_userPerfil(<?php $mostrarPerfil['id_user'] ?>)" data-toggle="modal" data-target="#editarPerfil">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Perfil

                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar Sesión
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->

<!-- PERFIL Modal-->
<div class="modal fade" id="editarPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <form class="formulario-registro" action="" method="post">


                    <div>
                        <input type="text" id="inputIDPerfil" name="idusuario" hidden="hidden "value="<?php echo $mostrar['id_user'] ?>">
                        <div class="form-group">
                            <span class="obligatorio">*</span>
                            <label for="inputNamePerfil">Nombres</label>
                            <input type="text" class="form-control" id="inputNamePerfil" placeholder="" name="nameuser" value="<?php echo $mostrar['username'] ?>">
                        </div>
                        <div class="form-group">
                            <span class="obligatorio">*</span>
                            <label for="inputLastNamePerfil">Apellidos</label>
                            <input type="text" class="form-control" id="inputLastNamePerfil" placeholder="" name="lastnameuser" value="<?php echo $mostrar['userlastname'] ?>">
                        </div>

                        <div class="form-group">
                            <span class="obligatorio">*</span>
                            <label for="inputDniPerfil">DNI / RUN</label>
                            <input type="text" class="form-control" id="inputDniPerfil" placeholder="" name="dniuser" value="<?php echo $mostrar['dni'] ?>">
                        </div>

                        <div class="form-group ">
                            <span class="obligatorio">*</span>
                            <label for="inputEmailPerfil">Correo Electrónico</label>
                            <input type="email" class="form-control" id="inputEmailPerfil" placeholder="" name="emailuser" autocomplete="off" value="<?php echo $mostrar['email'] ?>">
                        </div>


                        <div class="form-group ">
                                <span class="obligatorio">*</span>
                                <label for="inputRolePerfil">Rol</label>
                                <?php
                                $sql_rol_u = "SELECT id_rol,name_rol FROM rol";
                                $result1 = mysqli_query($conexion, $sql_rol_u);

                                // verificar si hay resultados
                                if (mysqli_num_rows($result1) > 0) {
                                    // generar el elemento select
                                    echo "<select disabled id='inputRolePerfil' class='form-control' readonly name='rol'>";
                                    echo "<option hidden='hidden' disabled >--- Seleccione ---</option>";

                                    while ($row = mysqli_fetch_assoc($result1)) {
                                        if ($row['id_rol'] == $mostrar['id_rol']) {
                                            echo "<option readonly value='" . $row['id_rol'] . "' selected>" . $row['name_rol'] . "</option>";
                                        } else {
                                            echo "<option  hidden='hidden' disabled value='" . $row['id_rol'] . "'>" . $row['name_rol'] . "</option>";
                                        }
                                    }
                                    echo "</select>";
                                } else {
                                    // si no hay resultados, mostrar un mensaje
                                    echo "No hay roles disponibles";
                                } ?>
                            </div>

                        <div class="form-group">
                            <span class="obligatorio">*</span>
                            <label for="inputCountryPerfil">País</label>
                            <?php
                            $sql_country_u = "SELECT id_country,name_country FROM country";
                            $result2 = mysqli_query($conexion, $sql_country_u);

                            // verificar si hay resultados
                            if (mysqli_num_rows($result2) > 0) {
                                // recorrer los resultados y generar una lista de opciones para el elemento select
                                echo "<select  id='inputCountryPerfil' class='form-control' name='pais'>";
                                echo "<option hidden='hidden' disabled >--- Seleccione ---</option>";
                                while ($row = mysqli_fetch_assoc($result2)) {
                                    if ($row['id_country'] == $mostrar['id_country']) {
                                        echo "<option value='" . $row['id_country'] . "'selected>" . $row['name_country'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row['id_country'] . "'>" . $row['name_country'] . "</option>";
                                    }
                                }
                                echo "</select>";
                            } else {
                                // si no hay resultados, mostrar un mensaje
                                echo "No hay países disponibles";
                            } ?>
                        </div>

                        <div class="form-group">
                            <span class="obligatorio">*</span>
                            <label for="inputBranchePerfil">Rama</label>
                            <?php

                            $sql_branches_u = "SELECT id_branches,name_branches FROM branches";
                            $result3 = mysqli_query($conexion, $sql_branches_u);

                            // verificar si hay resultados
                            if (mysqli_num_rows($result3) > 0) {
                                // generar el elemento select
                                echo "<select id='inputBranchePerfil' class='form-control' name='rama' onchange='rango_rama(this,\"inputGradePerfil\")'>";
                                echo "<option hidden='hidden' disabled>--- Seleccione ---</option>";
                                // recorrer los resultados y generar las opciones del elemento select
                                while ($row = mysqli_fetch_assoc($result3)) {
                                    if ($row['id_branches'] == $mostrar['id_branches']) {
                                        echo "<option value='" . $row['id_branches'] . "'selected>" . $row['name_branches'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row['id_branches'] . "'>" . $row['name_branches'] . "</option>";
                                    }
                                }
                                echo "</select>";
                            } else {
                                // si no hay resultados, mostrar un mensaje
                                echo "No hay ramas disponibles";
                            } ?>
                        </div>

                        <div class="form-group">
                            <span class="obligatorio">*</span>
                            <label for="inputGradePerfil">Grado</label>
                            <?php
                            $sql_grades_u = "SELECT id_grades,name_grades FROM grades ";
                            $result4 = mysqli_query($conexion, $sql_grades_u);

                            // verificar si hay resultados
                            if (mysqli_num_rows($result4) > 0) {
                                // generar el elemento select
                                echo "<select id='inputGradePerfil' class='form-control' name='grado'>";
                                echo "<option hidden='hidden' disabled>--- Seleccione ---</option>";
                                // recorrer los resultados y generar las opciones del elemento select
                                while ($row = mysqli_fetch_assoc($result4)) {
                                    if ($row['id_grades'] == $mostrar['id_grades']) {
                                        echo "<option value='" . $row['id_grades'] . "'selected>" . $row['name_grades'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row['id_grades'] . "'>" . $row['name_grades'] . "</option>";
                                    }
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Presiona "Salir" cuando estes listo para cerrar la sesión.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" type="button" data-dismiss="modal" name="btnsalir" onclick="window.location.href = './config/logout.php'">Salir</button>
            </div>
        </div>
    </div>
</div>