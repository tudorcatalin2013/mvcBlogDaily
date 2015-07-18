<?php
    
    class registerController extends Controller
    {	//coresponds to the register.html page
        public function __construct(){
            
            new headerController;
            new menuController;
            
            echo "<div class='register'>";
                new leftController;
                
                //simple registration form . if form submitted we load username image, and process the username,email ,password
                if (isset($_POST["register"]) && (!empty($_POST["username"])) && (!empty($_POST["password"])) && (!empty($_POST["email"])) ){
				    //the upload to the server image part 
				    $target_dir = "Uploads/";
				    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
				    $uploadOk = 1;
				    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				
				    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
				        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				    
                	//var_dump($_POST);
                	$username=$_POST["username"];
                	$password=$_POST["password"];
                	$password2=$_POST["password2"];
                	$email=$_POST["email"];
                	$imagePath='Uploads/'.$_FILES["imageUpload"]["name"];
                	echo"<div class='registerContent'>";
                	
                	if ($password===$password2){
                    	
                    	$temp=new contentModel;
                    	//if username,email available 
                    	if(($temp->usernameFree($_POST["username"]))&&(!$temp->emailExists($email))){
        			        
            			    	//creates activation code
                        		echo $activCode=uniqid(md5(rand()));
                        		//inserts user data withusername,password,email and activCode
                        		$temp->register($username,encryptPassword($password),$email,$activCode,$imagePath);
            				 	//sends email with password and activation ink
            
            					$body="hello dear $username , you are registered using the password $password click here for activation 
            					http://128.199.36.184/workspace/tpopa/mvc/index.php?page=home&&"."activCode=".$activCode."&&username=".$username;
            				 	$temp->sendEmail($email,"welcome",$body);     
        				 	
                    	}else{
                    		
                    		    echo"choose another username/email adress";
                    		
                    	}
                    	
                    	}else{
                    	    echo "please type the same password";
                    	}
                    	echo"</div>";
                    //end of submit form
                } else{
		         $data=array("register"=>"still not registered ? Complete the form down here");
		         echo $this->render(VIEWS.'registerView.php',$data);
                }
                
                new rightController;
            echo"</div>";
            
            new footerController;
            
        }
    }