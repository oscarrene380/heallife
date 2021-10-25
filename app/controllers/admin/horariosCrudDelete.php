<?php

include "../../modelos/conexion.php";

if (empty($_POST['idD'])) {
    header("location:../../vistas/admin/horariosCrud.php?Vacio=Algo salio mal, Id no encontrado");
} else {
    $consulta = "UPDATE horarios set id_estado=' 2 ' WHERE id_horario='" . $_POST['idD'] . "'";
    mysqli_query($con, $consulta);

    header("location:../../vistas/admin/horariosCrud.php?Exito=Registro actualizado correctamente!");
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";
