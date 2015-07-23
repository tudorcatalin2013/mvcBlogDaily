<?php 
	
	class contentModel extends DBModel
	{   
	    protected $username,$password,$email;
    
    	//returns an array (assoc) with all students
		public function showStudents(){
			$query="SELECT id,username,email FROM blog ";
			$results=$this->db()->query($query);//var_dump($results);//object
			foreach($results as $stud){
				$stud_array[]=$stud;
			}
// 			echo "<pre>";
// 			var_dump($stud_array);
			return $stud_array;
		}
		
		//returns an array with all future links from collegues 
		public function showLinks(){
			$query="SELECT linkName FROM links ";
			$results=$this->db()->query($query);//var_dump($results);//object
			//having an object is not ok for us , so we go trough it transforming it into an array
			foreach($results as $link){
			    //links_array[] =>if links_array doesn't exist it will create it , otherwise we add as a last key,value 
				$links_array[]=$link;
			}
			return $links_array;
		}
		
    //verifyies if login data is correct.we return boolean , true if login ok , false if not
    public function loginOk($username,$password)
    {
        $ok=false;
        $query="SELECT * 
                FROM blog 
                WHERE username='{$username}' AND password='{$password}' 
                ";

        $results=$this->db()->query($query);        
        //if user exists(if num_rows>0) with username and password given return true
        if ($results->num_rows>0)
            {
            $ok=true;
            }
        return $ok;    
    }		
		
	//verifyes if username is available
    public function usernameFree($username)
    {
        $free=true;
        $query="SELECT * 
                FROM blog 
                WHERE username='{$username}' 
                ";
        $db=$this->db();        
        $result=$db->query($query);
        if($result->num_rows>0)
        {
            $free=false;
        }
        return $free;
    }
	//verifyes if existing email  address
    public function emailExists($email)
    {   
        //$results=$this->db()->query($query);
        $exists=false;
        $query="SELECT * 
                FROM blog 
                WHERE email='{$email}' 
                ";
        $result=$this->db()->query($query);
        if($result->num_rows>0)
        {
            $exists=true;
        }
        return $exists;
    }
    //updates password for email given
    public function updatePassword($email,$password)
    {
        $query=" UPDATE blog
                 SET password='{$password}' 
                 WHERE email='{$email}' 
                ";
        $db=$this->db();
        $result=$db->query($query);
        if($result===true)
        {
            echo"password changed";
        }
        
    }
    //inserts new user 
    public function register($username,$password,$email,$activCode,$imagePath)
    {
        $db=$this->db();
        $query="INSERT INTO blog(username,password,email,activCode,imagePath)
                VALUES('{$username}','{$password}','{$email}','{$activCode}','{$imagePath}')
                ";
        $result=$db->query($query);
        if ($result===true)
        {
            echo "succesfully registered";        
        }
    }
    
    //return image name and path
    public function returnImagePath($username){
        $db=$this->db();
        $query="SELECT imagePath FROM blog
                WHERE username='{$username}' 
                ";
        $result=$db->query($query);
        while($row=mysqli_fetch_array($result)){
            return $row["imagePath"];
        }
    }
    
    //activates account
    public function activateAccount($activate,$username)
    {
        $db=$this->db();
        $query="UPDATE blog 
                SET active='1'
                WHERE activCode='{$activate}'   AND username='{$username}'
                ";
        $result=$db->query($query);        
    }
    
    //checksis user activated its account
    public function active($username)
    {
        $db=$this->db();
        $query="SELECT * 
                FROM blog
                WHERE username='{$username}' AND active='1' 
                ";
        $result=$db->query($query);
        if($result->num_rows>0)
        {
            return true;
        }else
        {
            return false;
        }
    }
    //shows all record from table
    public function showRecords()
    {
        $db=$this->db();
        
        $query="SELECT *
                FROM blog";
    
        $result=$db->query($query);
        while($row=$result->fetch_assoc()){
            echo "<br/>",$row["id"],"",$row["username"]," ",$row["password"];
        }
    }

    //deletes record using id given
    public function delRecord($id)
    {
        $query="DELETE FROM blog
                WHERE id='{$id}' 
                ";
        $result=$this->db()->query($query);     
        if($result===true)
        {
            echo"deleted succesfully";
        }
    }
    //modifyes record
    public function modRecord($id,$username,$password,$email)
    {
        $query="UPDATE blog
                SET username='{$username}',
                    password='{$password}',
                    email='{$email}' 
                WHERE id='{$id}' 
                ";        
        $results=$this->db()->query($query);
        if($results===true)
        {
            echo"modifyed succesfully";
        }        
    }
	//sends email
     function sendEmail($to,$subject,$body)
    {
        $header="from blog";
        if(mail($to,$subject,$body,$header))
        {
            echo 'An email was sent to your email adress with the activation link';
        }else
        {
            echo 'email NOT sent';
        }
    } 	
		
	}