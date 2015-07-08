<?php

	class colleguesController extends Controller
	{
		public function __construct(){
			
			new headerController;
			new menuController;
			
			$temp=new contentModel;
			$results=$temp->showLinks();//why oh why do i need to put paranthesis ?  i knew we need to put paranthesis when we call a function only if we had arguements
			
        echo"<div class='collegues'>";
			foreach($results as $res){
				echo $this->render(VIEWS.'colleguesView.php',
									array('collegues'=>implode(' ',$res))
									);
			}
		echo"</div>";	
			
			new footerController;
			
		}
	}