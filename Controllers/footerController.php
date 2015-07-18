<?php
    
    class footerController extends Controller
    {	//controller for the footer part of the blog
        public function __construct(){
            $data=array("name"=>"Tudor Catalin Popa");
            echo $this->render(VIEWS.'footerView.php',
                                $data
                                );
        }
    }