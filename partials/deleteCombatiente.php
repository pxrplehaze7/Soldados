<?php
require ("../config/conexion.php");

$id_soldier = $_POST['id_deleteSoldieraphp'];

$sqlD = "DELETE FROM soldier WHERE id_soldier = '$id_soldier'";
if(mysqli_query($conexion, $sqlD)){
    echo 'Eliminado exitosamente'; //respuesta 
} else {
    echo 'Error';
}