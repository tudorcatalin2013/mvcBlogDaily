<?php

	class colleguesController extends Controller
	{
		public function __construct(){
			//*************************************************************
			//**************preparing the cache****************************
			//*************************************************************
			//preparing the cache file
            $cacheFile ="cache/colleguesController.php";
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
        			new headerController;
        			new menuController;
        			
    			//we open the collegues div that will contain the left,colleguesContent and righ side    			
                echo"<div class='collegues'>";
                	new leftController;
                	
                		echo"<div class='colleguesContent'>";
		                	//we open the databse connection through the contentModel class
		                	$temp=new contentModel;
		                	//we get the future collegues links from the table links 
		        			$results=$temp->showLinks();//why oh why do i need to put paranthesis ?  i knew we need to put paranthesis when we call a function only if we had arguements
		                    echo "You can navigate to our other collegue's personal blogs to see what they've been up to :) ";
		        			
		        			//having receveid an array of assoc arrays we go through it array by array
		        			foreach($results as $res){
		        				//and render it
		        				echo $this->render(VIEWS.'colleguesView.php',
		        									//creating a new array that has the the correponding key from colleguesView
		        									//and as value it has a string created by imploding the values of the above assoc array >>line 39
		        									array('collegues'=>implode(' ',$res))
		        									);
		        			}
		        		echo"</div>";	
        			
        			new rightController;
        		echo"</div>";	
        			
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