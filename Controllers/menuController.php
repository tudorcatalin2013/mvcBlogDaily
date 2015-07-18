<?php
	
	class menuController extends Controller
	{	
		//takes the menu links from databse table
		private $menu;//=array("home","services","portfolio","about","contact","login");
		public function __construct(){
			//gets data from tabele within database
			$temp=new menuModel;
			$this->menu=$temp->get();
			
			echo "<div class='menu'>";
			
			foreach ($this->menu as $menuItem){
				foreach($menuItem as $Item){
					//if user logged in will not show the login button , and if user logged out will show the loggin button
					if (((isset($_SESSION["login"])) && ($Item==='login') && ($_SESSION["login"]===true)) || ((!isset($_SESSION["login"])) && ($Item==='logout'))) {                
		                //jumps current iteration
						continue;
					}else{
					//show the links for the menu	
					echo $this->render(VIEWS.'menuView.php',
										array("menuItem"=>$Item)
										);
					}				
				}
			}
			
			echo"</div>";
		}
	}