<?php
    
    class deleteController extends Controller
    {
        public function __construct(){
            
            new headerController;
            new menuController;
            
			//if id selected it deletes the registration coresponding to the id        
            if(isset($_POST["id"])){
                $temp = new contentModel;
                $temp->delRecord($_POST["id"]);
                echo $_POST["id"];
            }

            //will ask id to delete
            echo "<div class='delete'>";
                $data=array("delete"=>"delete the wanted user , using only it's id");
                echo $this->render(VIEWS.'deleteView.php',$data);
            echo "</div>";
            
            new footerController;
        }
    }