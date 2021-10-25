<?php
require_once 'config/config.php';
require_once 'controllers/controller.php';

if ($_GET) 
{
    if(count($_SESSION) > 0 && isset($_SESSION['login']))
    {
        switch ($_GET['url']) 
        {
            case 'login':
                require_once 'views/login.php';
                break;

            default: 
                echo 'Pagina no encontrada';
                break;
        }
    }
    else
    {
        require_once 'views/login.php';
    }
} 
else 
{
    require_once 'views/home.php';
}
