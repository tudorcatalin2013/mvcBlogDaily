<?php
    
    class anotherController extends Controller
    {
        public function __construct(){
            //*************************************************************
			//**************preparing the cache****************************
			//*************************************************************            
            //preparing the cache file
            $cacheFile ="cache/anotherController.php";
            //setting up the second number for the cache valability
        	$cacheTime=1; //2minute 
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
                    //nothing special . just a simple page
                    new headerController;
                    new menuController;
	                
	                
	               	//opening the another div . will contain left side , anotherContent(from anotherView.php) side and right side
	                echo "<div class='another'>";    
	                    new leftController;
	                    //new leftController;
	                    $data=array('another'=>'this will be another page for viewing . not decided what to show yet . this will be accesible to al guests(unregistered users) as well ');
	                    echo $this->render(VIEWS.'anotherView.php',$data);
	                    new rightController;
	                echo '</div>';    
	                    
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