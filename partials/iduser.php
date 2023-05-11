<?php
require("../config/conexion.php");



$id_user = $_POST['id_usuarioaphp'];
$respuesta= array();

$sql = "SELECT id_user, username, userlastname, dni, id_rol, id_country, id_branches, id_grades, email FROM user WHERE id_user = $id_user";
$result = mysqli_query($conexion, $sql);
$i=0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result))
    //ppor cada fila que encuentre, va a recorrer
    {
        $respuesta[$i]['id_user'] = $row['id_user'];
        $respuesta[$i]['username'] = $row['username'];
        $respuesta[$i]['userlastname'] = $row['userlastname'];
        $respuesta[$i]['dni'] = $row['dni'];
        $respuesta[$i]['id_rol'] = $row['id_rol'];
        $respuesta[$i]['id_country'] = $row['id_country'];
        $respuesta[$i]['id_branches'] = $row['id_branches'];
        $respuesta[$i]['id_grades'] = $row['id_grades'];
        $respuesta[$i]['email'] = $row['email'];
        $i++;
    }
}

echo json_encode($respuesta);//siempre hay que transformar el array a json con la funcion esa 