<?php
    class logedInController extends Controller{
        
        public function __construct(){
            
            $tmp=new contentModel;
            
                    if(isset($_POST["submit"])){
        			    if(isset($_POST["username"]) && isset($_POST["password"])){
        			        
        			        $temp=new contentModel;
        
                			$username = $_POST["username"];
                			$password = $_POST["password"];
        			        	
        			        	//if username, password is ok 
        			           if($temp->loginOk($username,encryptPassword($password))){
        			           		//if account activated
                			         if($temp->active($username))    
                			         {      
                			                
                			                $_SESSION["loginT"]=true;
                			                $_SESSION["username"]=$username;
                			                //if we have the file corresponding to imagePath from database
                			                if(file_exists($temp->returnImagePath($username))){
                			                	//we save it's name in a session
                			                    $_SESSION["imagePath"]=$temp->returnImagePath($username);
                			                }
									
        			           		}else    {   
        			           			echo"go to mail and activate your user account";}
        			                
        			           }   else{
        			                    echo'incorrect username/password';
            			                $data=array("login"=>"enter again your username/password");
            			                echo $this->render(VIEWS.'loginView.php',$data);
            			           }
        			    }
        			}
            
        }
    }