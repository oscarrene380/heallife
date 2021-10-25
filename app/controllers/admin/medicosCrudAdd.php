<?php

include "../../modelos/conexion.php";

$usuario = $_POST['usuario'];
$especialidad = $_POST['espe'];
$horario = $_POST['horario'];
$estado = $_POST['estado'];

if ($usuario == "") {
    header("location:../../vistas/admin/medicosCrud.php?Vacio=La hora fin no puede ser antes de la hora de inicio!");
} else {
    if (isset($usuario) && isset($especialidad) && isset($horario)) {
        $consulta = "SELECT COUNT(id_usu) AS user FROM medicos WHERE id_usu = ' $usuario ';";
        $ejecutar = mysqli_query($con, $consulta);
        $row = mysqli_fetch_array($ejecutar);
        if ($row['user'] > 0) {
            echo '<script>alert("INGRESE OTRO MEDICO")</script>';
            header("location:../../vistas/admin/medicosCrud.php?Error=Ya existe este usuario medico, intente otro!");
        } else {
            $consulta = "INSERT INTO medicos(id_usu, id_espe, id_horario, id_estado) values('$usuario', '$especialidad', '$horario', '$estado');";
            $ejecutar = mysqli_query($con, $consulta);

            if ($ejecutar) {
                header("location:../../vistas/admin/medicosCrud.php?Exito=Tu registro fue exitoso!");
            } else {
                header("location:../../vistas/admin/medicosCrud.php?Error=No se puedo registrar en el sistema");
            }
        }
    } else {
        header("location:../../vistas/admin/medicosCrud.php");
    }
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";