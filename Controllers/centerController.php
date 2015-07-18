<?php
    
    class centerController extends Controller
    {	//wil appers on the login page . will display only a random message 
        public function __construct(){
               	
               	$data=array("center"=>"some random text");
               	echo $this->render(VIEWS."centerView.php",$data);
               	
        }
    }