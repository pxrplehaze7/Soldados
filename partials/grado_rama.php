<?php
require("../config/conexion.php");


$id_rama = $_POST['id_nombrerama'];
$respuesta= array();

$sql = "SELECT id_grades,name_grades FROM grades WHERE id_branches = $id_rama";
$result = mysqli_query($conexion, $sql);
$i=0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $respuesta[$i]['id_grades'] = $row['id_grades'];
        $respuesta[$i]['name_grades'] = $row['name_grades'];
        $i++;
    }
}

echo json_encode($respuesta);//siempre hay que transformar el array a json con la funcion esa 




