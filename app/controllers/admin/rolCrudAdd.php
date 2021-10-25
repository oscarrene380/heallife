<?php

include "../../modelos/conexion.php";

if (isset($_POST['rol'])) {

    $rol = $_POST['rol'];
    $estado = $_POST['estado']; 

    if ($rol == "") {        
        header("location:../../vistas/admin/rolCrud.php?Vacio=Por favor llenar campos");
    } else {
        if (isset($rol)) {
            $consulta = "SELECT COUNT(descripcion) as d FROM roles WHERE descripcion='" . $rol . "'";
            $ejecutar = mysqli_query($con, $consulta);
            $row = mysqli_fetch_array($ejecutar);
            if ($row['d'] > 0) {
                echo '<script>alert("INGRESE OTRA HORA A ASIGNAR")</script>';
                header("location:../../vistas/admin/rolCrud.php?Error=Ya existe este rol registrado, intente otra!");
            } else {
                $consulta = "INSERT INTO roles(descripcion, id_estado) values('$rol', '$estado');";
                $ejecutar = mysqli_query($con, $consulta);

                if ($ejecutar) {
                    header("location:../../vistas/admin/rolCrud.php?Exito=Tu registro fue exitoso!");
                } else {
                    header("location:../../vistas/admin/rolCrud.php?Error=No se puedo registrar en el sistema");
                }
            }
        }else{
            header("location:../../vistas/admin/rolCrud.php");
        }
    }
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";