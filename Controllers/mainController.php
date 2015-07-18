<?php
	
	class mainController extends Controller
	{	//will help creting the navigation menu . the routing page
		
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
			//looks in the url and takes the page variable (if exists).	if not sets the variable to index.php
			if(isset($_GET["page"])){
				$page=$_GET["page"];
			}else{
				$page="index.php";
			}
			
			//if the variable page exists in the private $menu it opens the value of the coresponding key
			if(array_key_exists($page,$this->menu)){
				$object=new $this->menu[$page];
				//if notexisting page variable or , has no corespondent in the $menu it show an error page :)
			}else{
				new headerController;
				new errorController;
				new footerController;
			}
			
			
			
			
		}
	}