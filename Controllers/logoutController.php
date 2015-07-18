<?php
    
    class logoutController extends Controller
    {	
    	//corrsponds to the logout page
        public function __construct(){
            new headerController;
            new menuController;
            
            //if user logged in , echo's godbye message and destroys login session. also redirects to the home.html
            if(isset($_SESSION["username"])){
            	$data=array("logout"=>"Salut ".$_SESSION["username"]);
            
            //var_dump($_SESSION);
            echo $this->render(VIEWS.'logoutView.php',
            				$data);
            				//echo $_SESSION["username"];
            session_destroy();
            header("Location: home.html");
            }
            new footerController;
        }
    }