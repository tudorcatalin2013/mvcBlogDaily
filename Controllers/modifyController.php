<?php
    
    class modifyController extends Controller
    {
        public function __construct(){
            
            new headerController;
            new menuController;
            

            if(isset($_POST["modify"])){
                 $id=$_POST["id"];
                 $username=$_POST["username"];
                 $password=$_POST["password"];
                 $email=$_POST["email"];
                
                $temp=new contentModel;
                $temp->modRecord($id,$username,encryptPassword($password),$email);            
                
                
            }
            $data=array('modify'=>"modify user");
            echo $this->render(VIEWS.'modifyView.php',$data);
            
            new footerController;
        }
    }