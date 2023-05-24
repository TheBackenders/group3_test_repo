<?php 
declare(strict_types=1);
namespace app\models;
require(__DIR__."/baseModel.php");
// use app/models/connection;
class Family  extends baseModel{
    public int $id;
    public string $name;
    public bool $isemp;
    public int $count;
    public string $phone;
    public int $address;
    

function __construct(){
    parent::__construct();
}
public function test()
{
    return 0 ;
}
public  function setname($name){
     $this->name=$name;
}
public  function setisemp($isemp){
     $this->isemp= $isemp;
}
public function getname(){
    return $this->name;
}
 public  function getisemp(){
    return $this->isemp;
}
public  function setid($id){
     $this->id=$id;
}
public function getid(){
    return $this->id;
}
public  function setcount($count){
    $this->count=$count;
}
public function getcount(){
   return $this->count;
}
public  function setphone($phone){
    $this->phone=$phone;
}
public function getphone(){
   return $this->phone;
}
public  function setaddress($address){
    $this->address=$address;
}
public function getaddress(){
   return $this->address;
}


}


?>