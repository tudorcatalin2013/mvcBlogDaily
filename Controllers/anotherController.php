<?php
    
    class anotherController extends Controller
    {
        public function __construct(){
            //nothing special . just a simple page
            new headerController;
            new menuController;
            
            $data=array('another'=>'this will be another page for viewing . not decided what to show yet . this will be accesible to al guests(unregistered users) as well ');
            echo $this->render(VIEWS.'anotherView.php',$data);
            
            new footerController;
            
        }
    }