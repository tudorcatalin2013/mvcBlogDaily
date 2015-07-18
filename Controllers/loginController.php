<?php
    
    class loginController extends Controller
    {   
        //coresponds to the login.html . here we echo some text . adn offer the posibilty to login/register or reset password
        public function __construct(){
            //*************************************************************
			//**************preparing the cache****************************
			//*************************************************************
            //preparing the cache file
            $cacheFile ="cache/loginController.php";
            //setting up the second number for the cache valability
        	$cacheTime=1; //2minute 
        	//if cached file exists and cached file is modified in less then 120 seconds 
        	if(file_exists($cacheFile) && time()-$cacheTime<filemtime($cacheFile) ){
        		//some extra message 
        		echo "<p>Served from cache</p>";
        		//read from cached file
        		include $cacheFile;//readfile($cacheFile);//include $cacheFile;//header("Location: ");
        		die();//exit
        	}
            //starts buffer "recording"
            ob_start();//outputbuffer start
			//*************************************************************
			//**************normal html output*****************************
			//*************************************************************            
                    
                    
                    new headerController;
                    new menuController;
                
                //open the main div . will contain the left ,centerController and right side    
        	    echo "<div class='main'>";
        	        new leftController;
                    new centerController;
                    //var_dump($_GET);
                    $data=array("login"=>"Login form");
              		echo $this->render(VIEWS.'loginView.php',$data);
                
                echo "</div>";     
                
                    new footerController;
			//*************************************************************
			//************let's chace**************************************
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