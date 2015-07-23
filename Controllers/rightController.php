<?php
    
    class rightController extends Controller{
        //coresponds to the right side of each page
        public function __construct(){
	       echo "<div class='right'>";
	       		//if user logged in we echo an welcome message and show he/she's picture. if has one
		       if(isset($_SESSION["username"])){
					$username=$_SESSION["username"];
		            $data=array("right"=>"welcome , ".$username);
		            
		            echo $this->render(VIEWS."rightView.php",$data);
		            if(isset($_SESSION["imagePath"])){
		                //echo "we have a profile picture! , picture in progress";
		                echo "<img class='login' src=".$_SESSION["imagePath"].">";
		            }
		       	
		       }else{
		            $data=array("right"=>"here is the right side. i recommend logging in to see what thisblog can do ");
		            echo $this->render(VIEWS."rightView.php",$data);
		       }
	       
	       echo"</div>";     
        }
    }