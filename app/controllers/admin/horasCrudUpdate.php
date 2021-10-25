<?php

include "../../modelos/conexion.php";

if (empty($_POST['horaE']) ) {
    header("location:../../vistas/admin/horasCrud.php?Vacio=No dejar campos vacios");
} else {
    $consulta = "UPDATE horas set hora='" . $_POST['horaE'] . "', id_estado='" . $_POST['estadoE'] . "' WHERE id_hora='" . $_POST['idE'] . "'";
    mysqli_query($con, $consulta);

    header("location:../../vistas/admin/horasCrud.php?Exito=Registro actualizado correctamente!");
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";