<?php
require_once APP.'/models/model.php';
$model = new Modelo;
/*
$url = rtrim($_GET['url'], '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);
*/
if(isset($_POST['login']))
{
    $usuario = $_POST['dui'];
    $clave = $_POST['clave'];

    $login = $model->login($usuario, $clave);
    if($login)
    {
        header('Location: '.URL.'home');
    }
    else
    {
        header('Location: '.URL.'login');
    }
}