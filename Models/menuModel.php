<?php
	
	class menuModel extends DBModel
	{	
		//reads the navigation menu buttons from database table
		public function get(){
			
			$query="SELECT menuItem FROM menuModel";
			$results=$this->db()->query($query);
			
			// echo"<pre>";
			// var_dump($results);
			
			foreach($results as $res){
				$menu_array[]=$res;
			}
			
			return $menu_array;
			
		}
	}