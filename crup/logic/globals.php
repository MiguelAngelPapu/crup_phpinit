<?php
//Cometario:
/*
* By: MIGUEL ANGEL CASTRO ESCAMILLA
* Obtener las rutas absolutas del servidor
*/
class Rutas{
    private static $controller=null;
    public function getInstance(){
        if(self::$controller === null){
            self::$controller = new Rutas();
        }
        return self::$controller;
    }
    public function getPath(){
        //$path = $_SERVER['HTTP_HOST'].$_SERVER['SERVER_NAME'];//Lo min¿smo de abajo pero descomentar :V by--Jolver sin h--
        $path = __DIR__;//Esta line se debe comentar al momento de subir el proyecto al servidor
        $path = str_replace("\\","/", $path);
        $path = explode('/', $path);
        $ruta = count($path);
        $i=0; $cad="";
        if(self::$controller!=null){
            unset($path[$ruta-1]);
        }else{
            unset($path[$ruta-1],$path[$ruta-2]);
        }
        for($i =0;$i<count($path);$i++){
            $cad .= $path[$i]."/";
        }
        $path = str_replace("\\","/", $cad);
        return $path;
    }
    function __destruct(){
        self::$controller = null;
    }
}
?>