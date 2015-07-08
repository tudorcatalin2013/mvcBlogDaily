<?php
    
    class footerController extends Controller
    {
        public function __construct(){
            $data=array("name"=>"Tudor Catalin Popa");
            echo $this->render(VIEWS.'footerView.php',
                                $data
                                );
        }
    }