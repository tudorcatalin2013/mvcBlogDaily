<?php
    
    class contactController extends Controller
    {
        public function __construct(){
        	//registered/logged in users will see contact details , unregistered users will be invited to register 
            $data=array("contact"=>"telephone <b>0763510658</b> , email <b>tudorcatalin2013@yahoo.com</b>");
            $data_general=array("contact"=>"if you want to contact me by telephone or email , you must register and login first");
            
            new headerController;
            new menuController;
            
            if(isset($_SESSION["login"])){
                echo $this->render(VIEWS."contactView.php",$data);
            }else{
                echo $this->render(VIEWS."contactView.php",$data_general);
            }
        
            new footerController;
        }
    }