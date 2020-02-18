<?php
/**
 * Este archivo contiene la ejecuion de query(fecht y affect) 
 */

require "connection.php";
class Query{
	private static $_query = null;
	private static $db = null;

	public function __construct() {

	}
	public function getInstance(){
		if(self::$_query === null){
			self::$_query = new Query();
			self::$db = connect::getInstance()->getDatabase();
		}
		return self::$_query;
	}
	//USA RETORNAR UNA FILA CON LA ASOCIACION DEL QUERY {}
	public function FETCH_ASSOC($query, $data, $type){
		try {
			$resultado = self::$db->prepare($query);
			$resultado->execute($data);
			$res=$resultado->fetch(PDO::FETCH_ASSOC);
			return $this->response($type,$res);
		} catch (Exception $e) {
			$myobj = new stdClass();
			$res = explode(":", "".$e->getMessage());
			$myobj->info = array('code' => $res[0], 'message' => $res[1]);
			$myobj->error = 1;
			return $this->response($type,$myobj);
		} 
	}
	//USA RETORNAR VARIAS FILAS CON LA ASOCIACION DEL QUERY [{}]
	public function FETCH_ASSOC_ALL($query, $data, $type){
		try {
			$resultado = self::$db->prepare($query);
			$resultado->execute($data);
			$res=$resultado->fetchAll(PDO::FETCH_ASSOC);
			return $this->response($type,$res);
		} catch (Exception $e) {
			$myobj = new stdClass();
			$res = explode(":", "".$e->getMessage());
			$myobj->info = array('code' => $res[0], 'message' => $res[1]);
			$myobj->error = 1;
			return $this->response($type,$myobj);
		} 
	}
	//USA RETORNAR VARIAS FILAS CON LA ASOCIACION DEL QUERY [{}]
		public function ASSOC_ALL($query, $data){
			try {
				$resultado = self::$db->prepare($query);
				$resultado->execute($data);
				$res=$resultado->fetchAll(PDO::FETCH_ASSOC);

				return $res;
			} catch (Exception $e) {
				return $res;
			} 
		}
	//USA RETORNAR UNA FILA CON INDEX DEL QUERY {}
	public function FETCH_NUM($query, $data, $type){
		try {
			$resultado = self::$db->prepare($query);
			$resultado->execute($data);
			$res=$resultado->fetch(PDO::FETCH_NUM);
			return $this->response($type,$res);
		} catch (Exception $e) {
			$myobj = new stdClass();
			$res = explode(":", "".$e->getMessage());
			$myobj->info = array('code' => $res[0], 'message' => $res[1]);
			$myobj->error = 1;
			return $this->response($type,$myobj);
		}
	}
	//USA RETORNAR VARIAS FILAS CON INDEX DEL QUERY [{}]
	public function FETCH_NUM_ALL($query, $data, $type){
		try {
			$resultado = self::$db->prepare($query);
			$resultado->execute($data);
			$res=$resultado->fetchAll(PDO::FETCH_NUM);
			return $this->response($type,$res);
		} catch (Exception $e) {
			$myobj = new stdClass();
			$res = explode(":", "".$e->getMessage());
			$myobj->info = array('code' => $res[0], 'message' => $res[1]);
			$myobj->error = 1;
			return $this->response($type,$myobj);
		} 
	}
	//USA RETORNAR FILAS AFECTADAS DEL QUERY --MIGUEL
	public function ROW_COUNT($query, $data, $type){
		try{
			$resultado = self::$db->prepare($query);
			$resultado->execute($data);
			$res=$resultado->rowCount();
			return $this->response($type,$res);
		}catch (Exception $e) {
			$myobj = new stdClass();
			$res = explode(":", "".$e->getMessage());
			$myobj->info = array('code' => $res[0], 'message' => $res[1]);
			$myobj->error = 1;
			return $this->response($type,$myobj);
		}
    }
    public function exit($type,$message,$code=null){
        $obj = new stdClass();
        $obj->status = 1;
        $obj->success = 1;
        $obj->type = $type;
        $obj->data = array();
        $obj->error = 0;
        $obj->info = array('code' => 'Estado', 'message' =>$message);
        return json_encode($obj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    }
    public function _error($type,$message,$code=null){
        $obj = new stdClass();
        $obj->status = 0;
        $obj->success = 0;
        $obj->type = $type;
        $obj->data = array();
        $obj->error = 1;
        $res = explode(" ", "".$message);
        $obj->info = array('code' => ''.$res[0].' '.$res[1], 'message' => ''.$res[2].' '.$res[3].' '.$res[4]);
        return json_encode($obj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    }
	///MEtODO PARA RETORNAR RESPUESTA JSON  
	public function response($type,$res){
		//inicializar OBJECT
		$obj = new stdClass();
		$obj->status = 0;$obj->success = 0;$obj->type = "";$obj->data=array();$obj->error = 0;$obj->info =array();
		//asinar valores
		$obj->error = is_object($res) ? $res->error : 0;
		$obj->info = is_object($res) ? $res->info : array('code' => 0, 'message' => "Successfully");
		$obj->status = ($obj->error == 0) ? 1 : 0;
		if($type == "INSERT" || $type == "UPDATE" || $type == "DELETE" ){
			$obj->success = ($obj->error != 0) ? 0 : ($res > 0)? 1 : 0;
			$obj->data= array("rows_affected"=> is_object($res)? 0: $res);
			$obj->info = ($obj->success != 0) ? array('code' => 0, 'message' => "Successfully") : array('code' => 0, 'message' => "Incorrect");
		}else if($type == "SELECT"){
			$obj->success = ($obj->error != 0) ? 0 : 1;
			$obj->data = is_object($res) ? array() : $res;
		}
		else if($type == "REQUEST"){
			$obj->success = ($obj->error != 0) ? 0 : 1;
			$obj->info = is_object($res) ? $res->info : array('code' => $res['Error'], 'message' => $res['Response']);
			$obj->error =is_object($res) ? $res->error : ($res['Error'] == "" || $res['Error'] === null )? 0 : 1;
		}
		else if($type == "RESPONSE"){ 
			$obj->success = ($obj->error != 0) ? 0 : 1;
			$obj->data = is_object($res) ? array() : $res;
		}
		$obj->type = $type;
		return json_encode($obj, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
	}
}
?>