<?php

include "../../modelos/conexion.php";

if (isset($_POST['dui'])) {

    $dui = $_POST['dui'];
    $nombre = $_POST['nombre'];
    $nombre2 = $_POST['nombre2'];    
    $apellido = $_POST['apellido'];    
    $clave = $_POST['clave']; 
    $genero = $_POST['genero']; 
    $direccion = $_POST['direccion']; 
    $nivel = $_POST['nivel']; 
    $correo = $_POST['correo']; 
    $estado = $_POST['estado']; 

    if ($dui == "") {        
        header("location:../../vistas/admin/usuariosCrud.php?Vacio=Por favor llenar campos");
    } else {
        if (isset($clave)) {
            $consulta = "SELECT COUNT(dui) as user FROM usuarios WHERE dui='" . $dui . "'";
            $ejecutar = mysqli_query($con, $consulta);
            $row = mysqli_fetch_array($ejecutar);
            if ($row['user'] > 0) {
                echo '<script>alert("INGRESE OTRO NOMBRE DE USUARIO")</script>';
                header("location:../../vistas/admin/usuariosCrud.php?Error=Ya existe este usuario con este DUI, intente otro!");
            } else {
                $consulta = "INSERT INTO usuarios(dui, nombre, segundonombre, apellidos, clave, id_gen, direccion, id_rol, correo, id_estado) values('$dui', '$nombre', '$nombre2', '$apellido', '$clave', '$genero', '$direccion', '$nivel', '$correo', '$estado');";
                $ejecutar = mysqli_query($con, $consulta);

                if ($ejecutar) {
                    header("location:../../vistas/admin/usuariosCrud.php?Exito=Tu registro fue exitoso!");
                } else {
                    header("location:../../vistas/admin/usuariosCrud.php?Error=No se puedo registrar en el sistema");
                }
            }
        }else{
            header("location:../../vistas/admin/usuariosCrud.php");
        }
    }
}

@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";
