<?php

	class contentController extends Controller
	{
		public function __construct(){

			echo "<div class='home'>";
			//var_dump($_GET);
			$temp=new contentModel;
			
            //the activation part . user clicks link from mail. send is here and activates account. we take information from the url bar
            if(isset($_GET["activCode"]) && isset($_GET["username"]) && !empty($_GET["activCode"]) && !empty($_GET["username"]))
            {
                echo $activCode=$_GET["activCode"];    
                echo $username=$_GET["username"];
                $temp->activateAccount($activCode,$username);
                echo "account activated";
                
            }			
			
			//if  $_SESSION["login"], user is logged in , we echo all the users
			if((isset($_SESSION["login"])) && ($_SESSION["login"]===true)){
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
			
			if(isset($_POST["submit"])){
			    if(isset($_POST["username"]) && isset($_POST["password"])){

        			$username = $_POST["username"];
        			$password = $_POST["password"];
			        	
			        	//if username, password is ok 
			           if($temp->loginOk($username,encryptPassword($password))){
        			         if($temp->active($username))       {
        			                $_SESSION["login"]=true;
        			                //var_dump($_SESSION);
        			                //echo "username password Ok!";       
        			                
                                    $students=$temp->showStudents();
        
                        
                                    foreach($students as $stud){
                    			        echo $this->render(VIEWS."contentView.php",
                    					    			array("paragraf1"=>implode(" ",$stud))
                    						    		);
                                    }
        			                //here we will add the posibility to modify, delete 
          							echo "<p><a href='delete.html'>Delete record</a></p>";
        							echo "<p><a href='modify.html'>Modify record</a></p>";
      							
//        							echo "<p><a href='index.php?page=delete'>Delete record</a></p>";
//        							echo "<p><a href='index.php?page=modify'>Modify record</a></p>";
			                
			           		}else    {   
			           			echo"go to mail and activate your user account";}
			                
			           }   else{
			                    echo'incorrect username/password';
    			                $data=array("login"=>"enter again your username/password");
    			                echo $this->render(VIEWS.'loginView.php',$data);
    			           }
			    }
			}
		    echo"</div>";
		}
	}