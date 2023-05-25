<?php

declare(strict_types=1);
namespace app\controller;
require(__DIR__."/baseController.php");

class FamilyController extends baseController{
    public function __construct(){
        $this->creatModel
        (__DIR__."/../models/family.php","app\models\Family");
    }

    public function all(){
    
        $arg=[];
        $result=$this->model->all("family","*");
        while ($obj = $result -> fetch_object()){
            $arg[]=$obj;
                }
       $this->loadView("showall.html",$arg);
    }

    public function getOne($id){
       
        $res= $this->model->getOne('family',$id);
    
        $arg=$res;
 
        $this->loadView("showall.html",[$arg]);
        
     }

     public function delete($id)
     {
        $this->model->setid((int)$id);
        $this->model->delete($this->model,'family');
         header("Location:../../public");
           
     }
     public function addfamily(){
        $this->loadView("addfamily.html",'');
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          $cols=['name','isemp','count','phone','address'];
          $vals=[$_POST['name'],$_POST['isemp'],$_POST['count'],
          $_POST['phone'],$_POST['address']];
        
            
            $this->model->addone('family',$cols,$vals);
            header("Location:../../public");
        }
    }
    public function editfamily($id){
        $arg=$this->model->getOne('family',$id);
        $this->loadview("editfamily.html",$arg);
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            $this->model->setname($_POST['name']);
            $this->model->setisemp($_POST['isemp']);
            $this->model->setcount($_POST['count']);
            $this->model->setphone($_POST['phone']);
            $this->model->setaddress($_POST['address']);
           
        if($this->model->editfamily('family',$this->model))
            header("Location:Location:../../public");
           
        }
        
    }
    public function search()
    {
        $this->loadView("search.html",'');
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $sk=$_POST['searchkey'];
            $res= $this->model->search($sk);
            while ($obj = $res -> fetch_object()){
                $arg[]=$obj;
                    }
           $this->loadView("showall.html",$arg);
        }

    }


}