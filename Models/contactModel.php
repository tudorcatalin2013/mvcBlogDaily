<?php
    class contactModel extends DBModel{
        //inputs into database in table contact the values $sender,$message,$email
        public function registerMessage($sender,$message,$email){
            
            $db=$this->db();
            $query="INSERT INTO contact(sender,message,email)
                    VALUES('{$sender}','{$message}','{$email}')
                    ";
            $result=$db->query($query);
            if($result){
                echo"message stored succesfully in database";
            }
        }
        
        //sends message through email from $sender to site's admin 
        function sendEmail($sender,$message)
        {
            $header="from guests";
            $to="tudorcatalin2013@yahoo.com";
            
            if(mail($to,$sender,$message,$header))
            {
                echo 'email succesfully sent';
            }else
            {
                echo 'email NOT sent';
            }
        }
        
        //inputs in databse in table Reviews values $sender,$message, $email ,$time
        public function registerReview($sender,$message,$email,$time){
            $db=$this->db();
            $query="INSERT INTO Reviews(sender,message,email,time)
                    VALUES('{$sender}','{$message}','{$email}','{$time}')
                    ";
            $result=$db->query($query);
            if($result){
                echo"message stored succesfully in database";
            }
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