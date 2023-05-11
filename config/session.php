<?php
error_reporting(E_ERROR); //esta linea oculta errores
session_start();

if (!isset($_SESSION['id_user'])) { 
    header("Location: ./login.php");
}

if (isset($_SESSION['id_user'])) { 
    $id_del_usuario = $_SESSION['id_user'];
}

