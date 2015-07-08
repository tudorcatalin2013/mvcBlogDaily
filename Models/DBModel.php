<?php 

class DBModel
{
    //well , we know what this does :)
    const HOST="localhost";
    const USER="tpopa";
    const PASS="parola2015";
    const DB="tpopa";
    
    private $connection;
    
    public function __construct(){
        $this->connection=new mysqli(self::HOST,self::USER,self::PASS,self::DB);
        //echo "Ok!";
    }
    
    public function db(){
        return $this->connection;
    }
    
    public function close(){
        $this->connection->close();
    }
    
}


// echo"<pre>";
// var_dump($testObject=new DBModel());

// if($testObject->connect_error){
//     echo"connection error";
// }else{
//     echo "connection succesfull";
// }



