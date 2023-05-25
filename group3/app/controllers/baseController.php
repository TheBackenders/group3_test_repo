<?php
namespace app\controller;

class baseController{
    public $model;
    public function creatModel($file,$model){
        require($file);
        $this->model=new $model();
        return $this->model;
        

    }
    public function loadView($file,$arg){
        require(__DIR__."/../../views/".$file);
        


    }

}

?>