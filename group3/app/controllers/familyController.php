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
       
       $res= $this->model->getOne('family',$id);
       $this->model->setid((int)$res->id);
       // var_dump($row['id']);
       $this->model->setname($res->name);
       $this->model->setisemp($res->isemp);
       $this->model->setcount($res->count);
       $this->model->setaddress($res->address);
       $arg=$this->model;

       $this->loadView("family.html",$arg);
       return $arg;
    }

    public function all(){
   
        $arg=[];
        $result=$this->model->all("family","*");
        while ($obj = $result -> fetch_object()){
            $arg[]=$obj;
                }
       $this->loadView("showall.html",$arg);
    }



    public function search(){
        $this->loadView("search.html",'');
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $searchkey=$_POST['searchKey'];
            $arg=[]; 
            $result=$this->model->search($searchkey);
            while ($obj = $result -> fetch_object()){
                $arg[]=$obj;
            }
           $this->loadView("searchres.html",$arg);
        }
    
        }

        public function addone() 
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name=$_POST['name'];
                $isemp=$_POST['isemp'];
                $count=$_POST['count'];
                $phone=$_POST['phone'];
                $address=$_POST['address'];
   
            $row=$this->model->addone('family',['name','isemp','count','phone','address'],[$name,$isemp,$count,$phone,$address]);
           $this->index();
        }
        else
        {parent::loadview('addfamily.html',[]);}
        }

        public function editfamily($id){
            $arg=$this->model->getOne('family',$id);
            // var_dump($arg);
            $this->loadview("edit.html",$arg);
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->model->setname($_POST['name']);
                $this->model->setisemp($_POST['isemp']);
                $this->model->setcount($_POST['count']);
                $this->model->setaddress($_POST['address']);
            if($this->model->edituser('family',$this->model))
                header("Location:../../public/");
               
            }
            
        }

        public function delete($id){
            $this->model->setid((int)$id);
            $this->model->delete($this->model,'family');
            header("Location:../../public/");
               
            
            
        }

}


?>