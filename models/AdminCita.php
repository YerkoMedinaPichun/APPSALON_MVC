<?php 

namespace Model;

Class AdminCita extends ActiveRecord{
    //la mayoría de datos estarán en la tabl citasservicios
    protected static $tabla = 'citasservicios';
    //estas columnas no 'existen' como tal en la base de datos, pero son generadas a partir de una consulta SQL
    protected static $columnasDB = ['id','hora','cliente','email','telefono','servicio','precio'];

    public $id;//id de la cita
    public $hora;//hora de la cita
    public $cliente;//nombre y apellido de cliente
    public $email;//email de cliente
    public $telefono;//telefono de cliente
    public $servicio;//nombre del servicio
    public $precio;//precio del servicio

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->hora = $args['hora'] ?? '';
        $this->cliente = $args['cliente'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->servicio = $args['servicio'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }
}

?>