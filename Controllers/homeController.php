<?php
    
    class homeController extends Controller
    {	
    	//coresponding to the home.html
        public function __construct(){
        	//*************************************************************
			//**************preparing the cache****************************
			//*************************************************************            
            //preparing the cache file
            $cacheFile ="cache/homeController.php";
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
				//echo"<pre>";
				//var_dump($_POST,$_GET,$_SESSION);
/* 
echo"<pre>";
    print_r(array_keys(get_defined_vars()));
    print_r(get_defined_constants());
echo "</pre>"; 
*/    
				new logedInController;
				
               	new headerController;
               	new menuController;
                
                //open the main div. wil contain the leftside , the content part-which does the login,activation part,and the right side    	
        	    echo "<div class='main'>";
        	    
        	            new leftController;
                       	new contentController;
                       	new rightController;
                       	
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
                echo "</div>";   
        }
    }