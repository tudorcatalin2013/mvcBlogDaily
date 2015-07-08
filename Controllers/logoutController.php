<?php
    
    class logoutController extends Controller
    {
        public function __construct(){
            new headerController;
            new menuController;
            
            session_destroy();
            //var_dump($_SESSION);
            echo $this->render(VIEWS.'logoutView.php',
            				array("logout"=>"Hopa Popa "));
            
            new footerController;
        }
    }