<?php

include "../../modelos/conexion.php";

if (empty($_POST['rolE']) ) {
    header("location:../../vistas/admin/rolCrud.php?Vacio=No dejar campos vacios");
} else {
    $consulta = "UPDATE roles set descripcion='" . $_POST['rolE'] . "', id_estado='" . $_POST['estadoE'] . "' WHERE id_rol='" . $_POST['idE'] . "'";
    mysqli_query($con, $consulta);

    header("location:../../vistas/admin/rolCrud.php?Exito=Registro actualizado correctamente!");
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";