<?php

declare(strict_types=1);
namespace app\controller;
require(__DIR__."/baseController.php");
class UserController extends baseController{
    public function __construct(){
        $this->creatModel
        (__DIR__."/../models/user.php","app\models\User");
    }

    public function getOne($id){
       
       $res= $this->model->getOne('users',$id);
       $this->model->setid((int)$res->id);
       // var_dump($row['id']);
       $this->model->setname($res->name);
       $this->model->setemail($res->email);
       $arg=$this->model;

       $this->loadView("user.html",$arg);
       return $arg;
    }

    public function all(){
    //    $result= $this->model->all($table_name,$col);
        // $arg=[];
        // while($row=mysqli_fetch_assoc ($result)){
        //     $this->model->setid((int)$row['id']);
        //     // var_dump($row['id']);
        //     $this->model->setname($row['name']);
        //     $this->model->setemail($row['email']);
            
        //     $arg[]=$this->model;
        //    }
        $arg=[];
        $result=$this->model->all("users","*");
        while ($obj = $result -> fetch_object()){
            $arg[]=$obj;
                }
       $this->loadView("allusers.html",$arg);
    }



    public function searchuser(){
        $this->loadView("search.html",'');
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $searchkey=$_POST['searchKey'];
            $this->model->setname('');
            $this->model->setemail('');
            $arg=[]; 
            $result=$this->model->search("users",$searchkey,$this->model);
            while ($obj = $result -> fetch_object()){
                $arg[]=$obj;
            }
           $this->loadView("searchres.html",$arg);
        }
    
        }

        public function adduser(){
            $this->loadView("adduser.html",'');
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                // var_dump($_POST);
                $this->model->setname($_POST['name']);
                $this->model->setemail($_POST['email']);
                // echo ($this->model->getname());
                
                $this->model->adduser('users',$this->model);
            }
        }

        public function edituser($id){
            $arg=$this->model->getOne('users',$id);
            // var_dump($arg);
            $this->loadview("edituser.html",$arg);
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->model->setname($_POST['name']);
                $this->model->setemail($_POST['email']);
                $this->model->setid((int)$id);
            if($this->model->edituser('users',$this->model))
                header("Location:/darbni/newproject/public/");
               
            }
            
        }

        public function deletuser($id){
            $this->model->setid((int)$id);
            $this->model->deletuser($this->model,'users');
            header("Location:/darbni/newproject/public/");
               
            
            
        }

}


?>