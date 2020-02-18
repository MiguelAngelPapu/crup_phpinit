<?php
session_start();
include_once('../logic/query.php');
include_once('../logic/globals.php');
include_once('../logic/error.php');
include_once('../model/entities/inicio.php');

$_DATA = count($_POST) > 0 ? $_DATA = $_POST : $_DATA = json_decode(file_get_contents('php://input'),true);

 
if(!isset($_DATA["action"])){
    echo  __Error::getInstance()->Action();
    return;
}
switch($_SERVER['REQUEST_METHOD']){
    case "POST":
        validateActionPOST($_DATA["action"],$_DATA);
    break;
}
function validateActionPOST($action,$_DATA){ 
    try{ 
        switch($action){
            //Guardamos los datos del formulario
            case 'btn_guardar':
                $myjson = (json_decode($_DATA['myjson'], true));
                echo Inicio::getInstance()->insert_data_formulario($myjson['cedula'],$myjson['nombre'],$myjson['apellido'],$myjson['dirrecion'],$myjson['edad']); 
                break;
            //Eliminamos los datos del formulario
            case 'btn_eliminar':
                $myjson = (json_decode($_DATA['myjson'], true));
                echo Inicio::getInstance()->delete_data_formulario($myjson['cedula']); 
                break;
            //Buscamos los datos del usuario
            case 'btn_buscar':
                $myjson = (json_decode($_DATA['myjson'], true));
                echo Inicio::getInstance()->select_data_formulario($myjson['cedula']); 
                break;

            default:
                echo  __Error::getInstance()->Value("POST");
            break; 
        }
    }catch(PDOExeption $e){ 
        echo  __Error::getInstance()->Params();
    }
}
?>