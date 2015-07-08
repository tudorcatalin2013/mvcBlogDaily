<?php
    session_start();
    //setam sa ne afiseze ce erori avem 
    date_default_timezone_set('Europe/Bucharest');
	ini_set('display_errors',1);
    
    //$appPath = 'app/';
    $appPath='';
    //setam constante avand valori numele de models , views , controllers 
    define('MODELS',$appPath.'Models/');
    define('VIEWS',$appPath.'Views/');
    define('CONTROLLERS',$appPath.'Controllers/');
    //linia 13 si liniile 48-51 adaugate ulterior
    const SALT="some random text for encrypting";
    
    //autoload 
    function __autoload($className) {
		//initial dam o cale goala
		$classPath = '';
		//creeam o valoare care va contine className cu litere mici pt a puitea verifica ulterior numele 
		$classType = strtolower($className);

		
		if(substr_count($classType,'model')){
			$classPath = MODELS;	
		}
		// if(substr_count($classType,'view')){
		// 	$classPath = VIEWS;	
		// }
		if(substr_count($classType,'controller')){
			$classPath = CONTROLLERS;	
		}
		
		
		if($classPath!==''){
			$classFile = $classPath . $className . '.php';
			if (file_exists($classFile)) {
				require_once $classFile;
			}
			else {
				echo 'File <b>'.$classFile.'</b> does not exist!';
				}
		}
		else 
		{echo "Invalid path!";}
	}
	
	function encryptPassword($password)
    {
    return md5(md5($password)+SALT);
    }