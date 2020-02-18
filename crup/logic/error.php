<?php
class __Error {
    private static $error = null;
    public function getInstance(){
        if(self::$error === null){
            self::$error = new __Error();
        }
        return self::$error;
    }
    public function Action(){
        return $this->_error("Index","No action server found");
    }
    public function API(){
        return $this->_error("api-key","No api-key server found");
    }
    public function Params(){
        return $this->_error("Params","The action value was not found on the server");
    }
    public function Value($method){
        return $this->_error("Value","The param was not found on the server - ".$method);
    }
    private function _error($type,$message,$code=0){
        $obj = new stdClass();
        $obj->status = 0;
        $obj->success = 0;
        $obj->type = $type;
        $obj->data = array();
        $obj->error = 1;
        $obj->info = array('code' => $code, 'message' =>$message);
        return json_encode($obj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    }

}


?>