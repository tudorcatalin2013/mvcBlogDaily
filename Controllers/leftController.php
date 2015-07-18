<?php
    
    class leftController extends Controller{
        //represents the left side from each page
        public function __construct(){
            $data=array("left"=>"here is the left side  ");
            
            echo $this->render(VIEWS."leftView.php",$data);
        }
    }