<?php 

$pdo = new PDO('mysql:host=localhost;dbname=tpopa;charset=UTF8', 'tpopa', 'parola2015');

$statement = $pdo->prepare("select * from studentsAjax");
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo $json = json_encode($results);
