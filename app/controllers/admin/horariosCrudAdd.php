<?php

include "../../modelos/conexion.php";

$horai = $_POST['horai'];
$horaf = $_POST['horaf'];
$estado = $_POST['estado'];

if (strtotime($horai) > strtotime($horaf)) {
    header("location:../../vistas/admin/horariosCrud.php?Vacio=La hora fin no puede ser antes de la hora de inicio!");
} else {
    if (isset($horai) && isset($horaf)) {
        $consulta = "SELECT COUNT(horainicio) AS ho FROM horarios WHERE horainicio = '".$_POST['horai']."' AND horafin = '".$_POST['horaf']."';";
        $ejecutar = mysqli_query($con, $consulta);
        $row = mysqli_fetch_array($ejecutar);
        if ($row['ho'] > 0) {
            echo '<script>alert("INGRESE OTRO NOMBRE DE USUARIO")</script>';
            header("location:../../vistas/admin/horariosCrud.php?Error=Ya existe este horario, intente otro!");
        } else {
            $consulta = "INSERT INTO horarios(horainicio, horafin, id_estado) values('$horai', '$horaf', '$estado');";
            $ejecutar = mysqli_query($con, $consulta);

            if ($ejecutar) {
                header("location:../../vistas/admin/horariosCrud.php?Exito=Tu registro fue exitoso!");
            } else {
                header("location:../../vistas/admin/horariosCrud.php?Error=No se puedo registrar en el sistema");
            }
        }
    } else {
        header("location:../../vistas/admin/horariosCrud.php");
    }
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";
