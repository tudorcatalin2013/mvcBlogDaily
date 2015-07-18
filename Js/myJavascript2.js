//***********************************************
//***********************************************
//*********    slideshow   **********************
//***********************************************
//***********************************************
$(document).ready(function(){    
    //we use a var to count seconds from iddle process . iddle time of user non activity
    var idleTime = 0;
    //simulates user action(click) over .next class
    function foolMe(){
         $('.next').trigger('click');
    };
    
    //init values
        var temp=$('#wrapper img.bears');
        var pag=$('.pagination .bears');
    //init display    
        temp.show();
        pag.css("background-color","grey");
    //last images . we only use the img tag within the #wrapper id . or else it would conflict with other dom img   
        var lastPicture=$('#wrapper img').last();
        console.log(lastPicture);
        var firstPicture=$('#wrapper img').first();
        
        //if click on next button
        $('.next').on("click",function(){
        	//if last picture
            if(temp[0]==lastPicture[0])
            {   
            	//fadeout current image
                temp.stop().hide();
                pag.css("background-color","black");
                //reset current image
                temp=$('#wrapper img').first();
                pag=$('.pagination button').first();
                
                //console.log(pag);
                //console.log(temp);
                //display current image
                temp.stop().fadeIn(2000);
                pag.css("background-color","grey");
            }
            else
            {	//fadeout current image
                temp.stop().hide();
                pag.css("background-color","black");
                //fadin current image(next after fadded one)
                temp.next().stop().fadeIn(2000);
                pag.next().css("background-color","grey");
                //switches to next image, and pagination
                temp=temp.next();
                pag=pag.next();
            }
         
        });
        
        //click's on the previos button 
        $('.previous').on("click",function(){
            //clearInterval();
            if(temp[0]==firstPicture[0])
            {
            	temp.stop().hide();
                pag.css("background-color","black");
                
                temp=$('#wrapper img').last();
                pag=$('.pagination button').last();
                
                temp.stop().fadeIn(1000);
                pag.css("background-color","grey");
            }
            else
            {
                temp.stop().hide(); 
                pag.css("background-color","black");
                
                temp=temp.prev();
                pag=pag.prev();
                
                temp.stop().fadeIn(1000);
                pag.css("background-color","grey");
                
            }
        });
        
    // **********************************************************
    // *****************tricky but simple ***********************    
    // **********************************************************    
    
        //Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 1000); // 1 second
    
        //Zero the idle timer on mouse movement.
        $(this).mousemove(function (e) {
            idleTime = 0;
        });
        //Zero the idle timer on keypress.
        $(this).keypress(function (e) {
            idleTime = 0;
        });
    
    
    // ***********************************************************
    // ****************** set's up *******************************    
    // ***************** pagination ******************************
    // ***************** buttons    ******************************    
    //***************** for each image ***************************
        
        //if .pagination .bears button is clicked we slide to the bears image, after  hididng the current one
        $('.pagination .bears').on("click",function(){
           temp.stop().hide();
           pag.css("background-color","black");
            
            temp=$('img.bears');
           
            //console.log(pag);
            
            temp.stop().fadeIn(1000);
            pag=$('.pagination .bears').css("background-color","grey"); 
        });
        
        //if .pagination .deer button is clicked we slide to the deer image , after  hididng the current one
        $('.pagination .deer').on("click",function(){
            temp.stop().hide();
            pag.css("background-color","black");
            
            temp=$('img.deer');
            //console.log(pag);
            
            temp.stop().fadeIn(1000);
            pag=$('.pagination .deer').css("background-color","grey"); 
        });
        
        //if .pagination .bird button is clicked we slide to the bird image , after hididng the current one
        $('.pagination .bird').on("click",function(){
            temp.stop().hide();
            pag.css("background-color","black");
            
            temp=$('img.bird');
          
            //console.log(pag);
            
            temp.stop().fadeIn(1000);
            pag=$('.pagination .bird').css("background-color","grey"); 
        });
         
        //if .pagination .cats button is clicked we slide to the cats image , after hididng the current one 
        $('.pagination .cats').on("click",function(){
            temp.stop().hide();
            pag.css("background-color","black"); 
            
            temp=$('img.cats');
        
            //console.log(pag);
            
            temp.stop().fadeIn(1000);
            pag=$('.pagination .cats').css("background-color","grey"); 
        });
        
        //increments time (of iddle process)
        function timerIncrement() {
        idleTime = idleTime + 1;
        if ((idleTime % 5)===0) { // 5 seconds
            //console.log('au trecut 5 secunde ! simulam click pe butonul next , schimband poza',idleTime);
            foolMe();
        }
    }
});

//***********************************************
//***********************************************
//*********Real time clock **********************
//***********************************************
//***********************************************
    
    var myInterval2 = null;
    //we create two button , one for starting the real live clock , one for stoping it at it's current position
    document.getElementById('btnStart').addEventListener('click', startClock);
    document.getElementById('btnStop').addEventListener('click', stopClock);

    function startClock(){
        myInterval2 = setInterval(function(){myClock()},1000);
        myClock();
    }
    function stopClock() {
        clearInterval(myInterval2);
    }

    function myClock(){
        var d = new Date();
        document.getElementById("demo").innerHTML = d.toLocaleTimeString();
    }

//***********************************************
//***********************************************
//*********validating form **********************
//***********************************************
//***********************************************

//we validate the name , password and email from myForm email
function validateForm(){
 	
	var x=document.forms["myForm"]["username"].value;
	var y=document.forms["myForm"]["password"].value;
	var y2=document.forms["myForm"]["password2"].value;
	var z=document.forms["myForm"]["email"].value;
	//pretty self explanatory for each case
	if (x.length>=2){
	}else{
		alert('numele trebuie sa aiba cel putin 4 caractere');
		return false;//later if false it wont submit 
	}
	
	if (y.length>=2){
	}else{
		alert('parola trebuie sa aiba cel putin 4 caractere');
		return false;
	}
	
	if(y===y2){
	}else{
		alert('ati introdus gresit parola . trebuie sa fie identica !');
		return false;
	}

	if (z.indexOf('@',0)>0){
	}else{
		alert('adresa de email trebuie sa contina caracterul \'@\' ');
		return false;
	}	
}


    