<?php
    
    class contactController extends Controller
    {	
    	//coresponds to the contact page . here i've used three views , for three cases , as
    	//contactView => for logged in users only
    	//contactViewReview =>for getting reviews that are approved from databse. for logged in users only
    	//contactViewNoLogin=>for visitors . not logged in users
    	//is creating more views for a controller ok ??? or ...
        public function __construct(){
 			//*************************************************************
			//**************preparing the cache****************************
			//*************************************************************           
            //preparing the cache file
            $cacheFile ="cache/contactController.php";
            //setting up the second number for the cache valability
        	$cacheTime=5; //2minute 
        	//if cached file exists and cached file is modified in less then 120 seconds 
        	if(file_exists($cacheFile) && time()-$cacheTime<filemtime($cacheFile) ){
        		//some extra message 
        		echo "<p>Served from cache</p>";
        		//read from cached file
        		readfile($cacheFile);//include $cacheFile;//header("Location: ");
        		die();//exit
        	}
            //starts buffer "recording"
            ob_start();//outputbuffer start
			//*************************************************************
			//**************normal html output*****************************
			//*************************************************************    
                	//registered/logged in users will see contact details , unregistered users will be invited to register 
/*
echo"<pre>";
    print_r(array_keys(get_defined_vars()));
    print_r(get_defined_constants());
echo "</pre>";  
*/
              
                    new headerController;
                    new menuController;

					//open the main div containing the left,contacView and right side
                    echo "<div class='main'>";
                            
                	   new leftController;
                	   		
                	   		//opens the contactView which contains , ...
                            echo "<div class='contactView'>";
                    	        $temp=new contactModel;
                    	        //$temp->showReviews();
                
                                //checking if email has been sent
                    	        if(isset($_POST["submitEmail"])){
                    	        	//if fields are all complete
                    	            if(!empty($_POST["email"]) && !empty($_POST["message"])){
	                    	            
	                    	            //take data from form
	                    	            $sender=$_SESSION["username"];//$_POST["sender"];
	                    	            $email=$_POST["email"];
	                    	            $message=$_POST["message"];
	                    	            
	                    	            //insert data into database table contact
	                    	            if($temp->registerMessage($sender,$message,$email)){
	                    	                echo"message sucesfully saved";
	                    	            }else{
	                    	                echo"message not saved";
	                    	            }
	                    	            
	                    	            if($temp->sendEmail($email,$message)){
	                    	                echo"email sent succesfully!";
	                    	            }else{
	                    	                echo"email not sent";
	                    	            }
	                    	            
	                    	            //echo "message ready for sending ";
	                    			}else{
                    	                echo "you must complete all fields ";
                    	            }
                    	        }
                    	        
                    	        //checking if review has been sent
                    	        if(isset($_POST["submitReview"])){
                    	        				//if all fields completed
                                	            //if(!empty($_POST["sender"]) && !empty($_POST["email"]) && !empty($_POST["message"])){
	                                            if(!empty($_POST["message"])){
	                                	            //take data from form
	                                	            $sender=$_SESSION["username"];//$_POST["sender"];
	                                	            //$email=$_POST["email"];
	                                	            $message=$_POST["message"];
	                                	            $time=date('Y/m/d h-i');
	                                				
	                                				//insert data into database table            
	                                	            if($temp->registerReview($sender,$message,$time)){
	                                	                echo "rereview registered succesfully";
	                                	            }else{
	                                	                echo"review not registered";
	                                	            }
                                	            }else{
                                	                echo "you must complete all fields ";
                                	            }
                				}
                    	        
                    	        //we prepare two array , one for logged in users . on for general public
                                $data=array("contact"=>"telephone <b>0763510658</b> , email <b>tudorcatalin2013@yahoo.com</b>",
                                                    "reviews"=>"write a review about my work"
                                                    );
                                $data_general=array("contact"=>"if you want to contact me by telephone or email , you must register and login first",
                                                    "reviews"=>""
                                                    );
                                
                                //if user logged in
                                if(isset($_SESSION["loginT"])){
                                	//show special array $data for logged in users , offers posibility to contact via email blog's admin or to post a review about the site's admin
                                	echo $this->render(VIEWS."contactViewLogin.php",$data);
                                	
                                	//shows the reviews/comments. we open a review div for it
                                	echo"<div class='review'>";
                                	echo"<h3>Reviews from colabortors/clients</h3>";
                                    	$reviews=$temp->showReviews();
                                    	foreach($reviews as $rev){ 
                                    		echo $this->render(VIEWS."contactViewReview.php",
                                    							array("reviews"=>$rev)
                                    							);
                                    	}
                                    echo"</div>";	
                                }else{
                                    echo $this->render(VIEWS."contactViewNoLogin.php",$data_general);
                                }
                        
                        echo "</div>";        
                	        new rightController;
                    echo "</div>";     
                    
                    new footerController;
                    
                    
                
			//*************************************************************
			//************let's cache**************************************
			//*************************************************************                
            //if exists $cacheFile opens it for writting and overwrittes it . if not it creates it            
            $fis= fopen($cacheFile,"w");
            //puts the ob "recording" in the cache file
            file_put_contents($cacheFile,ob_get_contents());
            fclose($fis);
            //stops "recoding"
            ob_end_flush();           
        }
    }