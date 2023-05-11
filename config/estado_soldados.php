<?php

$sql_vivos = "SELECT COUNT(id_status) n_vivos FROM soldier WHERE id_status=1";
$sqlV = mysqli_query($conexion, $sql_vivos);
$total_vivos = mysqli_fetch_assoc($sqlV); //CIFRA TOTAL DE SOLDADOS VIVOS

$sql_muertos = "SELECT COUNT(id_status) n_muertos FROM soldier WHERE id_status=2";
$sqlM = mysqli_query($conexion, $sql_muertos);
$total_muertos = mysqli_fetch_assoc($sqlM); //CIFRA TOTAL DE SOLDADOS MUERTOS

$sql_prisioneros = "SELECT COUNT(id_status) n_prisioneros FROM soldier WHERE id_status=3";
$sqlP = mysqli_query($conexion, $sql_prisioneros);
$total_prisioneros = mysqli_fetch_assoc($sqlP); //CIFRA TOTAL DE SOLDADOS PRISIONEROS

$sql_desaparecidos = "SELECT COUNT(id_status) n_desaparecidos FROM soldier WHERE id_status=4";
$sqlD = mysqli_query($conexion, $sql_desaparecidos);
$total_desaparecidos = mysqli_fetch_assoc($sqlD); //CIFRA TOTAL DE SOLDADOS DESAPARECIDOS

$sql_heridos = "SELECT COUNT(id_status) n_heridos FROM soldier WHERE id_status=5";
$sqlH = mysqli_query($conexion, $sql_heridos);
$total_heridos = mysqli_fetch_assoc($sqlH); //CIFRA TOTAL DE SOLDADOS HERIDOS

$total= $total_vivos['n_vivos'] + $total_muertos['n_muertos'] + $total_prisioneros['n_prisioneros'] + $total_desaparecidos['n_desaparecidos'] + $total_heridos['n_heridos'];
$porcentajeV = $total_vivos['n_vivos'] * 100 / $total;
$porcentajeM = $total_muertos['n_muertos'] * 100 / $total;
$porcentajeP = $total_prisioneros['n_prisioneros'] * 100 / $total;
$porcentajeD = $total_desaparecidos['n_desaparecidos'] * 100 / $total;
$porcentajeH = $total_heridos['n_heridos'] * 100 / $total;