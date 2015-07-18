<?php
	//base controller
	class Controller
	{
	    public function render($page, $data)
	    {
	    $template = file_get_contents($page);
	    //preg_match_all(pattern, pagina, rezultate);
	    preg_match_all('({{[a-zA-Z0-9_]*}})',$template,$matches);
	    
	    
	    foreach($matches[0] as $value){
	    	//removes all {{ from the begining , the end of each expression
	        $key = str_replace("{{","",$value);
	        $key = str_replace("}}","",$key);
	      
	      	//replaces expressions surounded by {{}} from page $template with the values of coresponding(same name)
	      	// keys , from data array 
	        if(array_key_exists($key, $data)){
	            $template = str_replace($value,$data[$key],$template);
	        }
	    }
	    return $template;
	    }

	}
