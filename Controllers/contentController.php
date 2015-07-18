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
        			
        			//here we take information from the login form.we check if the info corresponds to the database
        			if(isset($_POST["submit"])){
        			    if(isset($_POST["username"]) && isset($_POST["password"])){
        
                			$username = $_POST["username"];
                			$password = $_POST["password"];
        			        	
        			        	//if username, password is ok 
        			           if($temp->loginOk($username,encryptPassword($password))){
        			           		//if account activated
                			         if($temp->active($username))    
                			         {      
                			                
                			                $_SESSION["login"]=true;
                			                $_SESSION["username"]=$username;
                			                //if we have the file corresponding to imagePath from database
                			                if(file_exists($temp->returnImagePath($username))){
                			                	//we save it's name in a session
                			                    $_SESSION["imagePath"]=$temp->returnImagePath($username);
                			                }else{
                			                    echo"daca alegeai o poza de profil arata mai fain";    
                			                }
											
											//we echo al students/users from database
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
        			
        			//if we have no data for activation code, or for loging in ,we echo message for users and invite them to login
        			if(!isset($_post["submit"]) && !isset($_SESSION["login"]) && !isset($_GET["activCode"]) && !isset($_GET["username"]))
        			 {
        			    $data=array("paragraf1"=> " Welcome to My personal blog ! This summs up a big part of what i've learned at the Scoala Informala's course . To actually see it work please register and log in . If you don't feel like registering  use the username <b>tudor</b> and password <b>parola</b> . Please don't break it and delete my login account:)");
        			   echo $this->render(VIEWS."contentView.php",$data);
        			}
		    echo"</div>";
		    

		}
	}