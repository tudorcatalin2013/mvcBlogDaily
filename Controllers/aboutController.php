<?php
   
    class aboutController extends Controller
    {	//coresponds to the about page
    
        public function __construct(){
            //*************************************************************
			//**************preparing the cache****************************
			//*************************************************************            
    		//setting up the path and name of the cache file
            $cacheFile ="cache/aboutController.php";
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
        			//div for the main part of the page . contains the left , the aboutContent and the right side	
        			echo "<div class='about'>"; 	
        				new leftController;
        				
                    	//preparing $data , $data_general if user registerd in sees $data , else sees $data_general
        	            $data_general=array("about"=>"Everything you want to know about me , you will find after loging in. Also you will be able to see a short drawings slideshow...");
        	            $data=array("about"=>"Congratulations on creating an account and loging in . You will now benefit special offers");
        	            	
        	            	//opening aboutContent div . 
		        	    	echo "<div class='aboutContent'>";       
		        	           if(isset($_SESSION["login"])){ 
		        	           		//if user logged in sees $data , sepcial message
		        	            	echo $this->render(VIEWS.'aboutView.php', $data);
									//we prepare the html part of the slide show.i've put them here not knowing if it's the best way or i should've created a speacil view for this case .
									//shortly i've created  
									//	- two buttons , on for the nex and one for the previous picture
									// 	- 4 img tags every one coresponding to one image(with a class name for each one) . the slider contains 4 images
									//  - 4 buttons corresponding to each image 
									//when we click next it would slide to the next image . when we click the buttons 1-4 it would slide to the corresponding image
									//also in the javascript section i've created an iddle case , in which case (iddle > 5 seconds ) the slider starts on it's own from the first picture or from the picture of your choosing 
		        	            	echo   "<div id=\"wrapper\">    
		                                        <div class=\"button\">
		                                            <button class=\"previous\">Previous</button>
		                                            <button class=\"next\">Next</button>
		                                        </div>
		                                        
		                                        <div class=\"images\">
		                                            <img class=\"bears\" src=\"jpg/bears.jpg\" alt=\"some text\"/>
		                                            <img class=\"deer\" src=\"jpg/deer.jpg\"  alt=\"some text\"/>
		                                            <img class=\"bird\"  src=\"jpg/bird.jpg\"  alt=\"some text\"/>
		                                            <img class=\"cats\" src=\"jpg/cats.jpg\"  alt=\"some text\"/>
		                                        </div>
		                                        
		                                        <div class=\"pagination\">  
		                                            <button class=\"bears\">1</button>
		                                            <button class=\"deer\">2</button>
		                                            <button class=\"bird\">3</button>
		                                            <button class=\"cats\">4</button>
		                                        </div>
		                                    </div>";
		                                    
		        	           }else {
		        	           		//if not logged in sees a general message , recomanding to log in 
		        	           		echo $this->render(VIEWS.'aboutView.php', $data_general);
		        	           }
		        	        echo "</div>";   
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