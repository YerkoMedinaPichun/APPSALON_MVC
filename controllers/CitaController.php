<?php  

namespace Controllers;

use MVC\Router;

class CitaController{
    
    public static function index (Router $router){

        //session_start();//En esta parte iniciamos sesion con confianza, ya que esta zona es privada

        isAuth();

        $router->render('cita/index',[
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
}

?>