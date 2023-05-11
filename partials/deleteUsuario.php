<?php
require ("../config/conexion.php");

$id_user = $_POST['id_deleteUseraphp'];

$sqlDS = "DELETE FROM user WHERE id_user = '$id_user'";
if(mysqli_query($conexion, $sqlDS)){
    echo 'Eliminado exitosamente'; //respuesta 
} else {
    echo 'Error';
}