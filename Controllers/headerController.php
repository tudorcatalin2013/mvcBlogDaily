<?php

    class headerController extends Controller
    {	
    	//construtcs the hmlt tag , the title page ,opens the body tag
        public function __construct(){
            $data=array("title"=>"this is my new blog's title");
            echo $this->render(VIEWS.'headerView.php',
                                $data
                                );
        }
    }