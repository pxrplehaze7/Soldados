<?php
require ("../config/conexion.php");

$id_combat = $_POST['id_soldieraphp'];

$respuesta = array();

$sql ="SELECT id_soldier , id_status, name_soldier, lastname, age, date_birth, dni, id_country, id_branches, id_grades, unit, date_admission, date_death, place_death FROM soldier WHERE id_soldier = $id_combat";

$result = mysqli_query($conexion, $sql);
$j=0;

if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        $respuesta[$j]['id_soldier'] = $row['id_soldier'];
        $respuesta[$j]['name_soldier'] = $row['name_soldier'];
        $respuesta[$j]['lastname'] = $row['lastname'];
        $respuesta[$j]['dni'] = $row['dni'];
        $respuesta[$j]['age'] = $row['age'];
        $respuesta[$j]['date_birth'] = $row['date_birth'];
        $respuesta[$j]['id_country'] = $row['id_country'];
        $respuesta[$j]['id_branches'] = $row['id_branches'];
        $respuesta[$j]['id_grades'] = $row['id_grades'];
        $respuesta[$j]['id_status'] = $row['id_status'];
        $respuesta[$j]['unit'] = $row['unit'];
        $respuesta[$j]['date_admission'] = $row['date_admission'];
        $respuesta[$j]['date_death'] = $row['date_death'];
        $respuesta[$j]['place_death'] = $row['place_death'];
        $j++;
    }
}
echo json_encode($respuesta);