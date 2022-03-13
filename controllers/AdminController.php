<?php namespace Controllers;

use Model\AdminCita;
use MVC\Router;


class AdminController{
    public static function index(Router $router){
        //session_start();

        // $consulta = "SELECT citas.id, citas.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        // $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        // $consulta .= " FROM citas  ";
        // $consulta .= " LEFT OUTER JOIN usuarios ";
        // $consulta .= " ON citas.usuarioId=usuarios.id  ";
        // $consulta .= " LEFT OUTER JOIN citasServicios ";
        // $consulta .= " ON citasServicios.citaId=citas.id ";
        // $consulta .= " LEFT OUTER JOIN servicios ";
        // $consulta .= " ON servicios.id=citasServicios.servicioId ";
        // $consulta .= " WHERE fecha =  '${fecha}' ";

        //consultar la base de datos
        
        isAdmin();//redirige a los que no son admin a la pagina principal
        

        date_default_timezone_set('America/Santiago');

        $fecha = $_GET['fecha'] ?? date('Y-m-d');
        $fechas = explode('-',$fecha);

        if(!checkdate($fechas[1],$fechas[2],$fechas[0])){
            header('Location: /404');
        }
        
        //debuguear($fecha);
        
        

        $query = "SELECT citas.id,citas.hora, CONCAT(usuarios.nombre,' ', usuarios.apellido) as cliente,";
        $query .="usuarios.email,usuarios.telefono,";
        $query .="servicios.nombre as servicio,servicios.precio ";
        $query .="FROM citas ";
        $query .="LEFT OUTER JOIN usuarios ";
        $query .="ON citas.usuarioId=usuarios.id ";
        $query .="LEFT OUTER JOIN citasservicios ";
        $query .="ON citasservicios.citasId=citas.id ";
        $query .="LEFT OUTER JOIN servicios ON servicios.id=citasservicios.servicioId ";
        $query .="WHERE fecha = '${fecha}';";

        //debuguear($query);
        $citas = AdminCita::SQL($query);
        $router->render('admin/index',[
            'nombre' => $_SESSION['nombre'],
            'citas' => $citas,
            'fecha' => $fecha
        ]);
    }
}

?>