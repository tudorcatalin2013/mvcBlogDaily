<?php
    
    class loginController extends Controller
    {
        public function __construct(){
            $data=array("login"=>"Login form");
            
            new headerController;
            new menuController;
            
            var_dump($_GET);
      		echo $this->render(VIEWS.'loginView.php',$data);
            
            new footerController;
        }
    }