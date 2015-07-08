<?php 
	
	class contentModel extends DBModel
	{   
	    protected $username,$password,$email;
    
    	//returns an array with all students
		public function showStudents(){
			$query="SELECT * FROM blog ";
			$results=$this->db()->query($query);//var_dump($results);//object
			foreach($results as $stud){
				$stud_array[]=$stud;
			}
			return $stud_array;
		}
		
		//returns an array with all future links from collegues 
		public function showLinks(){
			$query="SELECT linkName FROM links ";
			$results=$this->db()->query($query);//var_dump($results);//object
			foreach($results as $link){
				$links_array[]=$link;
			}
			return $links_array;
		}
		
    //verifyies if login data is correct
    public function loginOk($username,$password)
    {
        $ok=false;
        $query="SELECT * 
                FROM blog 
                WHERE username='{$username}' AND password='{$password}' 
                ";

        $results=$this->db()->query($query);        
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
    public function register($username,$password,$email,$activCode)
    {
        $db=$this->db();
        $query="INSERT INTO blog(username,password,email,activCode)
                VALUES('{$username}','{$password}','{$email}','{$activCode}')
                ";
        $result=$db->query($query);
        if ($result===true)
        {
            echo "succesfully registered";        
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
            echo 'email succesfully sent';
        }else
        {
            echo 'email NOT sent';
        }
    } 	
		
	}