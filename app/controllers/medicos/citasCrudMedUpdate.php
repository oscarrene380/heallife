<?php

include "../../modelos/conexion.php";

if (empty($_POST['fechaE'])) {
    header("location:../../vistas/medicos/citasCrudMed.php?Vacio=No dejar campos vacios");
} else {
    $consulta = "UPDATE reservaciones set id_usu='" . $_POST['usuarioE'] . "', fecha='" . $_POST['fechaE'] . "', id_hora='" . $_POST['horaE'] . "', id_espe='" . $_POST['espeE'] . "', id_med='" . $_POST['medE'] . "', id_estado='" . $_POST['estadoE'] . "' WHERE id_res='" . $_POST['idE'] . "'";
    mysqli_query($con, $consulta);

    header("location:../../vistas/medicos/citasCrudMed.php?Exito=Registro actualizado correctamente!");
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";
