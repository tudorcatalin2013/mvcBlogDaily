<?php 

$pdo = new PDO('mysql:host=localhost;dbname=tpopa;charset=UTF8', 'tpopa', 'parola2015');

$statement = $pdo->prepare("delete from studentsAjax where id=:id");
$statement->bindParam(':id', $_POST['id'], PDO::PARAM_INT);  
$statement->execute();