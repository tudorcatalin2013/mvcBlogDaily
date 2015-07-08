<?php
	
	class mainController extends Controller
	{	//will help creting the navigation menu
		private $menu=array(
							'home'=>'homeController',
							'about'=>'aboutController',
							'contact'=>'contactController',
							'login'=>'loginController',
							'logout'=>'logoutController',
							'modify'=>'modifyController',
							'delete'=>'deleteController',
							'forgot'=>'forgotController',
							'register'=>'registerController',
							'another'=>'anotherController',
							'collegues'=>'colleguesController',
							'delete'=>'deleteController'
							);
		public function __construct(){
			
			if(isset($_GET["page"])){
				$page=$_GET["page"];
			}else{
				$page="index.php";
			}
			
			if(array_key_exists($page,$this->menu)){
				$object=new $this->menu[$page];
			}else{
				new headerController;
				new errorController;
				new footerController;
			}
			
			
			
			
		}
	}