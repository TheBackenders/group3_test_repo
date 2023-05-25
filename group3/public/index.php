<?php 
use app\controller\familyController;
require(__DIR__."/../app/controllers/familyController.php");
// require(__DIR__."/../app/controllers/productcontroller.php");
define('BASE_PATH', '/git/group3/public/');
// echo "jgjkugbjl";
$request=$_SERVER['REQUEST_URI'] ;
if ($request === BASE_PATH) {  
    $ucontroller = new familyController();
        $ucontroller->all();    
    }
    elseif($request === BASE_PATH.'search'){
        $ucontroller = new familyController();
        $ucontroller->search();  

    }
    elseif($request === BASE_PATH.'addfamily'){
        $ucontroller = new familyController();
        $ucontroller->loadview('addfamily.html',[]);
        $ucontroller->addone();

    }
    elseif(strpos($request ,BASE_PATH.'edit/')===0){
        $id = substr($request, strlen(BASE_PATH . 'edit/'));
        $ucontroller = new familyController();
        $ucontroller->editfamily($id);


    }
    elseif(strpos($request ,BASE_PATH.'deletefamily/')===0){
        $id = substr($request, strlen(BASE_PATH . 'deletefamily/'));
        $ucontroller = new familyController();
        $ucontroller->delete($id);  

    }
   

   

// if (strpos($_SERVER['REQUEST_URI'], BASE_PATH . 'searchuser/') === 0) {
    
//     $id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'user/'));
//     $ucontroller = new UserController();
//     $ucontroller->getOne($id);}


?>