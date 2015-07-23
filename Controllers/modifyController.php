<?php
    
    class modifyController extends Controller
    {
        public function __construct(){
            
            new headerController;
            new menuController;
            
            echo"<div class='modifyContent'>";
                new leftController;
                
                    echo"<div class='modify'>";
        			    //if form is submited >you cand change a field , or all fields . no matter what
                        if(isset($_POST["modify"])){
                             $id=$_POST["id"];
                             $username=$_POST["username"];
                             $password=$_POST["password"];
                             $email=$_POST["email"];
                            
                            //opens the connection to the database
                            $temp=new contentModel;
                            //inserts the modified data
                            $temp->modRecord($id,$username,encryptPassword($password),$email);            
                            
                            
                        }
                    echo"</div>";        
                        //if form not submited offer the posibility to do that 
                        $data=array('modify'=>"modify user");
                        echo $this->render(VIEWS.'modifyView.php',$data);
                    
                
                new rightController;
            echo"</div>";    
            new footerController;
        }
    }