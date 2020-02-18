<?php

///PRUEBA DE EXCEPTION;
class ActionException extends Exception {

    public function  __construct($message = null){
        if($message == null){
            $message = $this->toString();
        }
        parent::__construct($message);
    }
    public function toString(){
        $obj = new stdClass();
        $obj->status = 0;
        $obj->success = 0;
        $obj->type = "Index";
        $obj->data = array();
        $obj->error = 1;
        $obj->info = array('code' => "0", 'message' => "No action server found");
        return json_encode($obj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    }
}
class ParamsException extends Exception {

    public function  __construct($message = null){
        if($message == null){
            $message = $this->toString();
        }
        parent::__construct($message);
    }
    public function toString(){
        $obj = new stdClass();
        $obj->status = 0;
        $obj->success = 0;
        $obj->type = "Params";
        $obj->data = array();
        $obj->error = 1;
        $obj->info = array('code' => "0", 'message' => "The param was not found on the server");
        return json_encode($obj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    }
}
class ValueException extends Exception {

    public function  __construct($message = null){
        if($message == null){
            $message = $this->toString();
        }
        parent::__construct($message);
    }
    public function toString(){
        $obj = new stdClass();
        $obj->status = 0;
        $obj->success = 0;
        $obj->type = "Value";
        $obj->data = array();
        $obj->error = 1;
        $obj->info = array('code' => "0", 'message' => "The action value was not found on the server");
        return json_encode($obj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    }
}

?>