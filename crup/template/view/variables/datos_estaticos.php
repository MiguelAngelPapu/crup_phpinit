<?php
class Datos{
    private static $datos = null;
    public function __construct() {

    } 
    public function getInstance(){ 
        if(self::$datos === null){
            self::$datos = new Datos();
        }
        return self::$datos;  
    }
    public function menu(){
        $botones = new stdClass();
        $botones->GUARDAR = ['icono' => 'save','mensajes'=> array('')];
        $botones->ELIMINAR = ['icono' => 'delete','mensajes'=> array('')];
        $botones->BUSCAR = ['icono' => 'search','mensajes'=> array('')];
        $botones->LIMPIAR = ['icono' => 'clear','mensajes'=> array('')];
        return $botones;
    }
    public function input(){
        $input = new stdClass();
        $input->CEDULA = ['tipo'=>'number','mensajes'=> array('')];
        $input->NOMBRE = ['tipo'=>'text','mensajes'=> array('')];
        $input->APELLIDO = ['tipo'=>'text','mensajes'=> array('')];
        $input->DIRRECION = ['tipo'=>'text','mensajes'=> array('')];
        $input->EDAD = ['tipo'=>'number','mensajes'=> array('')];
        return $input; 
    }
}

?>