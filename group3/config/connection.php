<?php
namespace app\database;
class Connection{
    public $db_params;
   public function __construct(){
        $this->db_params=require_once(__DIR__."/database.php");
    }

public function getConnection(){
    $conn=mysqli_connect($this->db_params['host'],$this->db_params['username'],
    $this->db_params['password'],$this->db_params['database']);
    if ($conn->connect_error){
        die("connection faild".$conn->connect_error);
    }
    return $conn;
}
}

?>