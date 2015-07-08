<?php
    
    class leftController extends Controller{
        
        public function __construct(){
            $data=array("left"=>"here is my facebook's embeded post ");
            
            echo $this->render(VIEWS."leftView.php",$data);
        }
    }