<?php
/**
 * Archivo de conexion a la base de datos mysql usando (PDO)
 * Metodo de conexion
 */
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "query.php";
class connect
{
	protected $host = "localhost";
	protected $dbname = "dbusuario";
	protected $user = "root";
	protected $pasww = ''; 
	protected static $pdo_db = null;
	private static $conn = null;
	public function __construct()
    {
        try
        { self::getDataBase();}
        catch(PDOException $ex)
        {}
    }
	public function getInstance(){
		if(self::$conn === null){
			self::$conn = new self();
		}
		return self::$conn;
	}
	public function getDatabase(){
		

		if(self::$pdo_db == null){
			try{
				self::$pdo_db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8",$this->user,$this->pasww);
				self::$pdo_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			}catch(exception $e){
				return Query::getInstance()->_error("Conexion",$e->getMessage());
			}
		}
		return self::$pdo_db;
		
	}
	function __destruct(){
		self::$pdo_db = null;
	}
}

?>