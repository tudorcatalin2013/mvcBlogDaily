<?php
    class contactModel extends DBModel{
        
        //inputs into database in table contact the values $sender,$message,$email
        public function registerMessage($sender,$message,$email){
            $ok=false;
            $db=$this->db();
            $query="INSERT INTO contact(sender,message,email)
                    VALUES('{$sender}','{$message}','{$email}')
                    ";
            $result=$db->query($query);
            if($result){
               $ok=true;
            }
            return $ok;
        }
        
        //sends message through email from $sender to site's admin 
        function sendEmail($sender,$message)
        {
            $ok=false;
            $header="from blog user ";
            $to="tudorcatalin2013@yahoo.com";
            
            if(mail($to,$sender,$message,$header))
            {   
                $ok=true;
                //echo 'email succesfully sent';
            }
            return $ok;
        }
        
        //inputs in databse in table Reviews values $sender,$message ,$time
        public function registerReview($sender,$message,$time){
            $ok=false;
            $db=$this->db();
            $query="INSERT INTO Reviews(sender,message,time)
                    VALUES('{$sender}','{$message}','{$time}')
                    ";
            $result=$db->query($query);
            if($result){
                $ok=true;
            }
            return $ok;
        }
        
        //gets an array of values from database table Reviews containing 
        //values of the fields message,sender,time for each approved review. ok default value null . 
        //if reviews is not licentious is approve it(set value to 1)
        function showReviews(){
            $db=$this->db();
            $query="SELECT message,sender,time FROM Reviews
                    WHERE ok=1
                    ";
            $results=$db->query($query);
            //if ($results){
            //   echo'we have mesages';
            //}else{
            //   echo'no messages';
            //}
            foreach($results as $res){  
                $test[]=$res["message"]." written by <b>".$res["sender"]."</b>"." at ".$res["time"];
            }
            return $test;
        }
            
        
    }