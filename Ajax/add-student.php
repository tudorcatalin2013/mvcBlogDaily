<?php 
echo "!!!";
echo"<pre>";
var_dump($_POST);

$pdo = new PDO('mysql:host=localhost;dbname=tpopa;charset=UTF8', 'tpopa', 'parola2015');


$statement = $pdo->prepare("insert into studentsAjax (fname, lname) values (:fname, :lname)");
$statement->bindParam(':fname', $_POST['fname'], PDO::PARAM_STR);     
$statement->bindParam(':lname', $_POST['lname'], PDO::PARAM_STR);     
$statement->execute();