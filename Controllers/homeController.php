<?php
    
    class homeController extends Controller
    {
        public function __construct(){
            
            	//$object=new Controller;
            	new headerController;
            	new menuController;//adus de pe lina 12
            	
	    echo "<div class='container'>";
            	
            	
            	new leftController;
            	new contentController;
            	
            	
        echo "</div>";   
        new footerController;//adus de pe linia 17
        
        }
    }