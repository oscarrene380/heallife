<?php
require_once 'config/config.php';
require_once 'controllers/controller.php';

if ($_GET) 
{
    if(count($_SESSION) > 0 && isset($_SESSION['login']))
    {
        switch ($_GET['url']) 
        {
            case 'home':
                echo 'Pagina principal';
                break;
            case 'login':
                header("Location: ".URL."home");
                break;
            case 'logout':
                session_destroy();
                header("Location: ".URL."login");
                break;
            default: 
                echo 'Pagina no encontrada';
                break;
        }
    }
    else
    {
       switch($_GET['url'])
       {
            case 'login':
                require_once 'views/login.php';
                break;

            default:
            echo 'Pagina no encontrada';
                break;
       }
    }
} 
else 
{
    require_once 'views/home.php';
}
