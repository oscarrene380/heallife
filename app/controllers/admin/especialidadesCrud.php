<?php
include "../../modelos/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	try
	{
		$consulta = "INSERT INTO especialidades(descripcion, id_estado) VALUES('{$_POST['especialidad']}', 1);";
		mysqli_query($con, $consulta);
		echo json_encode(array("success" => "¡Especialidad registrada!"));
	}
	catch(Exception $e)
	{
		echo json_encode(array("error" => "Error: ".$e->getMessage()));
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	try
	{
		parse_str(file_get_contents("php://input"), $_DELETE);
		$consulta = "UPDATE especialidades SET id_estado = 2 WHERE id_espe = {$_DELETE['idespecialidad']};";
		mysqli_query($con, $consulta);
		echo json_encode(array("success" => "¡Especialidad de baja satisfactoriamente!"));
	}
	catch(Exception $e)
	{
		echo json_encode(array("error" => "Error: ".$e->getMessage()));
	}
}

if($_SERVER['REQUEST_METHOD'] == 'PUT')
{
	try
	{
		parse_str(file_get_contents("php://input"), $_PUT);
		$consulta = "UPDATE especialidades SET descripcion = '{$_PUT['editespecialidad']}' WHERE id_espe = {$_PUT['editidespecialidad']}";
		mysqli_query($con, $consulta);
		echo json_encode(array("success" => "¡Especialidad actualizada satisfactoriamente!"));
	}
	catch(Exception $e)
	{
		echo json_encode(array("error" => "Error: ".$e->getMessage()));
	}
}

//@mysqli_free_result($ejecutar);
include "../../modelos/cerrar_conexion.php";
