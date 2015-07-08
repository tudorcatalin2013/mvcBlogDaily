<?php
   
    class aboutController extends Controller
    {
        public function __construct(){
                new headerController;
				new menuController;
				
			echo "<div class='about'>"; 	
            	//if user registerd/logged in sees special message
	            $data_general=array("about"=>"Everything you want to know about me , you will find after loging in. Also you will be able to see a short drawings slideshow...");
	            $data=array("about"=>"Congratulations on creating an account and loging in . You will now benefit special offers");
	            
	           
	           if(isset($_SESSION["login"])){ 
	            	echo $this->render(VIEWS.'aboutView.php', $data);
	            	echo "<div id=\"wrapper\">    
    <div class=\"button\">
        <button class=\"previous\">Previous</button>
        <button class=\"next\">Next</button>
    </div>
    
    <div class=\"images\">
        <img class=\"bears\" src=\"jpg/bears.jpg\" alt=\"some text\"/>
        <img class=\"deer\" src=\"jpg/deer.jpg\"  alt=\"some text\"/>
        <img class=\"bird\"  src=\"jpg/bird.jpg\"  alt=\"some text\"/>
        <img class=\"cats\" src=\"jpg/cats.jpg\"  alt=\"some text\"/>
    </div>
    
    <div class=\"pagination\">  
        <button class=\"bears\">1</button>
        <button class=\"deer\">2</button>
        <button class=\"bird\">3</button>
        <button class=\"cats\">4</button>
    </div>
  
</div>"; 
	           }else {
	           		echo $this->render(VIEWS.'aboutView.php', $data_general);
	           }
	        echo"</div>";   
	           
                new footerController;
                            
        }
    }