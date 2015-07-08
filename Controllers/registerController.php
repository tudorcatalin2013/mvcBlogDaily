<?php
    
    class registerController extends Controller
    {
        public function __construct(){
            
            new headerController;
            new menuController;
            
            //simple registration form
            if (isset($_POST["register"]) && (!empty($_POST["username"])) && (!empty($_POST["password"])) && (!empty($_POST["email"])) ){
            	//var_dump($_POST);
            	$username=$_POST["username"];
            	$password=$_POST["password"];
            	$email=$_POST["email"];
            	
            	$temp=new contentModel;
            	//if username,email available 
            	if(($temp->usernameFree($_POST["username"]))&&(!$temp->emailExists($email))){
			    	//creates activation code
            		echo $activCode=uniqid(md5(rand()));
            		//inserts user data withusername,password,email and activCode
            		$temp->register($username,encryptPassword($password),$email,$activCode);
				 	//sends email with password and activation ink

					$body="hello dear $username , you are registered using the password $password click here for activation 
					http://128.199.36.184/workspace/tpopa/mvc/index.php?page=home&&"."activCode=".$activCode."&&username=".$username;
																	//."&&activCode=".$activCode."&&username=".$username
					
					// $body="hello dear $username , you are registered using the password $password click here for activation xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
					// http://128.199.36.184/workspace/tpopa/week2/login.php?activCode=".$activCode."&&username=".$username;					
				 	

				 	$temp->sendEmail($email,"welcome",$body);     
				 	
            	}else{
            		echo"choose another username/email adress";
            	}
            	
            }
            
            $data=array("register"=>"still not registered ? Complte the form down here");
            echo $this->render(VIEWS.'registerView.php',$data);
            
            new footerController;
            
        }
    }