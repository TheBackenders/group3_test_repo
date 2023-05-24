<?php
namespace app\models;
require_once(__DIR__."/../../config/connection.php");
use app\database\Connection;

class baseModel{
    public $connection;
    public function __construct(){
        $db= new Connection();
        $this->connection=$db->getConnection();
    }


    public function all($table_name,$args){
        $query="SELECT ".$args." FROM ".$table_name."";
        $result=$this->connection->query($query);
        return $result;
    }
    public function getOne($table_name,$id){
        $query="SELECT * FROM ".$table_name." WHERE id='".$id."'";
        $result=$this->connection->query($query);
        echo "<br>";
        // var_dump($result);
        return $result->fetch_object();
    }
   


    public function deletuser($user,$table_name){
        $id=$user->getid();
        // var_dump($id);
        $query="DELETE FROM ".$table_name." WHERE id=$id ";
        $result=$this->connection->query($query);
        // var_dump($result);
        return $result;
    }

    // public function adduser($table_name,$model){
    //     $modelArr=(array)$model;
    //     $query="INSERT INTO ".$table_name." (";
    //     foreach($modelArr as $col=>$value){
    //         if ($col=='connection')
    //         continue;
    //         $query=$query.$col.",";
    //     }
    //    $q= substr($query,0,-1);
    //     $query=$query.") VALUES (";
    //     foreach($modelArr as $col=>$value){
    //         if ($col=='connection')
    //         continue;
    //         $query=$query."'".$value."',";
    //     }
    //     $query=substr($query,0,-1);
    //     $query=$query.")";
    //     echo $query;
    //     $result=$this->connection->query($q);
    //     return $result;

    // }
    
    public function addone($tb_name,$col, $var) {
   
        $q = "INSERT  INTO ".$tb_name ."(";   
      $len = count($col);
         for($i=0;$i<$len-1;$i++)
         {$q = $q . $col[$i].",";}
            $q = $q.$col[$len-1];
         $q = $q . ") Values (";
         for($i=0;$i<$len-1;$i++)
        { $q = $q ."'". $var[$i]."',";}
        $q = $q."'".$var[$len-1]."'";

        $q =  $q . ");";
        $result = $this->connection->query($q);}
   
    public function edituser($table_name,$model){
        $id=$model->getid();
        $modelArr=(array)$model;
        $query="UPDATE  ".$table_name." SET ";
        foreach($modelArr as $col=>$value){
            if ($col=='connection')
            continue;
            if ($col=='id')
            continue;
            $query=$query.$col."='".$value."' ,";
        }
        $q=substr($query,0,-1);
        $query=$query." WHERE id=".$id;
        echo $query;
        $result=$this->connection->query($query);
        return $result;
 
    }

    public function search($search){
        $query = "SELECT * FROM family WHERE family.address =(SELECT id FROM place WHERE name =" .$search.")";
        $result=$this->connection->query($query);
        
        return $result;

}
}



?>