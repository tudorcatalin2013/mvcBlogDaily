<?php
    
    class errorController extends Controller
    {	
        public function __construct(){
            //if page doesnt exist displays error !
            new menuController;
            echo"<div class='error'><p>page doesn't exist !</p></div>";
        }
    }