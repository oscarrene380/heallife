<?php

include "../../modelos/conexion.php";

if (empty($_POST['idD'])) {
    header("location:../../vistas/admin/medicoCrud.php?Vacio=Algo salio mal, Id no encontrado");
} else {
    $consulta = "UPDATE medicos set id_estado=' 2 ' WHERE id_med='" . $_POST['idD'] . "'";
    mysqli_query($con, $consulta);

    header("location:../../vistas/admin/medicosCrud.php?Exito=Registro eliminado correctamente!");
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";
