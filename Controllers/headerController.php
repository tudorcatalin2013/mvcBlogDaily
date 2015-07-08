<?php

    class headerController extends Controller
    {
        public function __construct(){
            $data=array("title"=>"this is my new blog's title");
            echo $this->render(VIEWS.'headerView.php',
                                $data
                                );
        }
    }