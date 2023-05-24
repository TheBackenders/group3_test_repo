<?php 
use app\controller\UserController;
require(__DIR__."/../app/controllers/userController.php");
// require(__DIR__."/../app/controllers/productcontroller.php");
define('BASE_PATH', '/darbni/newproject/public/');
// echo "jgjkugbjl";
$request=$_SERVER['REQUEST_URI'] ;
if ($request === BASE_PATH) {  
    $ucontroller = new UserController();
        $ucontroller->all();    
    }
    elseif($request === BASE_PATH.'searchuser'){
        $ucontroller = new UserController();
        $ucontroller->searchuser();  

    }
    elseif($request === BASE_PATH.'adduser'){
        $ucontroller = new UserController();
        $ucontroller->adduser();  

    }
    elseif(strpos($request ,BASE_PATH.'edituser/')===0){
        $id = substr($request, strlen(BASE_PATH . 'edituser/'));
        $ucontroller = new UserController();
        $ucontroller->edituser($id);  

    }
    elseif(strpos($request ,BASE_PATH.'deletuser/')===0){
        $id = substr($request, strlen(BASE_PATH . 'deletuser/'));
        $ucontroller = new UserController();
        $ucontroller->deletuser($id);  

    }
   

   

// if (strpos($_SERVER['REQUEST_URI'], BASE_PATH . 'searchuser/') === 0) {
    
//     $id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'user/'));
//     $ucontroller = new UserController();
//     $ucontroller->getOne($id);}


?>