<?php
namespace App\Support;
class Coleciones
{
    protected $item = [];
    private static $coleciones = null;
    public function getinstance(){
        if(self::$coleciones===null){
            self::$coleciones= new Coleciones();
        }
        return self::$coleciones;
    }
    public function insert(array $data=[]){
        $this->item = $data;
    }
    public function get(){
        return $this->item;
    }
    public function count(){
        return count($this->item);
    }
}

?>