<?php
    
    class forgotController extends Controller
    {
        public function __construct(){
            
            new headerController;
            new menuController;
        echo "<div class='forgot'>";    
            if(isset($_POST["email"])){
                $email=$_POST["email"];
                $temp=new contentModel;
                
                //if mail exists in database
                if($temp->emailExists($email)){
                    echo 'email address ok ! ';
                    //generate new password
                    $new_password=uniqid(md5(rand()), true);
                    //updates password in database and then sends email with the new password
                    $temp->updatePassword($email,encryptPassword($new_password));
                    $temp->sendEmail($email,'xxx',$new_password);
                    
                    
                    
                }else{
                    echo'no user with such email adress';
                }
            }
            
            $data=array("forgot"=>"Recover password from ");
            echo $this->render(VIEWS."forgotView.php",$data);
        echo "</div>";    
            new footerController;
        }
    }