<?php

	class contentController extends Controller
	{
		//reffers to the main content of the home.html . here we echo users from database .we also process login and activate account. we can add users to the database,modify or delete them
		public function __construct(){

	    	echo "<div class='content'>";
        			//var_dump($_GET);
        			$temp=new contentModel;
        			
                    //the activation part . user clicks link from mail. send it here and activates account. we take information from the url bar
                    if(isset($_GET["activCode"]) && isset($_GET["username"]) && !empty($_GET["activCode"]) && !empty($_GET["username"]))
                    {
                        $activCode=$_GET["activCode"];    
                        $username=$_GET["username"];
                        //activate account
                        $temp->activateAccount($activCode,$username);
                        echo "account activated";
                        
                    }			
        			
        			//if  $_SESSION["login"], user is logged in , we echo all the users
        			if((isset($_SESSION["loginT"])) && ($_SESSION["loginT"]===true)){
        			    $students=$temp->showStudents();
                                    foreach($students as $stud){
                    			        echo $this->render(VIEWS."contentView.php",
                    					    			array("paragraf1"=>implode(" ",$stud))
                    						    		);
                                    }
        			 //here we will put the links to modify , delete
        			 echo "<p><a href='modify.html'>Modify</a></p>";
        			 echo "<p><a href='delete.html'>Delete</a></p>";
        			 
        			}
        			

        			
        			//if we have no data for activation code, or for loging in ,we echo message for users and invite them to login
        			if(!isset($_post["submit"]) && !isset($_SESSION["loginT"]) && !isset($_GET["activCode"]) && !isset($_GET["username"]))
        			 {
        			    $data=array("paragraf1"=> " Welcome to My personal blog ! This summs up a big part of what i've learned at the Scoala Informala's course . To actually see it work please register and log in . If you don't feel like registering  use the username <b>tudor</b> and password <b>parola</b> . Please don't break it and delete my login account:)");
        			   echo $this->render(VIEWS."contentView.php",$data);
        			}
		    echo"</div>";
		    

		}
	}