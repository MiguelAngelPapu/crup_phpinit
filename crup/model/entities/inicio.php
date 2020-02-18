<?php
class Inicio {
    private static $inicio = null;
    private static $query;
    public function __construct() {

    } 
    //REMPLAZAR EL CONSTRUCT
    public function getInstance(){ 
        if(self::$inicio === null){
            self::$inicio = new Inicio();
            self::$query = Query::getInstance(); 
        }
        return self::$inicio;
    }
    //Guardamos los datos del formulario
    public function insert_data_formulario($cedula,$nombre,$apellio,$dirrecion,$edad){
        $sql = "CALL insert_data_formulario('$cedula','$nombre','$apellio','$dirrecion','$edad')";
        $res = self::$query->FETCH_ASSOC($sql,array(),"REQUEST");
        return $res;
    }
     //Eliminamos los datos del formulario
     public function delete_data_formulario($cedula){
        $sql = "CALL delete_data_formulario('$cedula')";
        $res = self::$query->FETCH_ASSOC($sql,array(),"REQUEST");
        return $res;
    }
     //buscamos los datos del usuario
     public function select_data_formulario($cedula){
        $res = self::$query->FETCH_ASSOC("CALL select_data_formulario(?)",array($cedula),"SELECT");
        return $res;
    }
}
?>