//we use a var to count seconds from iddle process . iddle time of user non activity
var idleTime = 0;
//simulates user action over .next class
function foolMe(){
     $('.next').trigger('click');
};

$(document).ready(function(){    
//init values
    var temp=$('img.bears');
    var pag=$('.pagination .bears');
//init display    
    temp.show();
    pag.css("background-color","grey");
//last images    
    var lastPicture=$('img').last();
    var firstPicture=$('img').first();
    
    $('.next').on("click",function(){
    	//if last picture
        if(temp[0]==lastPicture[0])
        {   
        	//fadeout current image
            temp.stop().hide();
            pag.css("background-color","black");
            //reset current image
            temp=$('img').first();
            pag=$('.pagination button').first();
            
            console.log(pag);
            console.log(temp);
            //display current image
            temp.stop().fadeIn(2000);
            pag.css("background-color","grey");
        }
        else
        {	//fadeout current image
            temp.stop().hide();
            pag.css("background-color","black");
            //fadin current image
            temp.next().stop().fadeIn(2000);
            pag.next().css("background-color","grey");
            
            temp=temp.next();
            pag=pag.next();
        }
     
    });
    
    
    $('.previous').on("click",function(){
        //clearInterval();
        if(temp[0]==firstPicture[0])
        {
        	temp.stop().hide();
            pag.css("background-color","black");
            
            temp=$('img').last();
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


// **********************************************************
// **********************************************************    
    
    $('.pagination .bears').on("click",function(){
       temp.stop().hide();
       pag.css("background-color","black");
        
        temp=$('img.bears');
       
        //console.log(pag);
        
        temp.stop().fadeIn(1000);
        pag=$('.pagination .bears').css("background-color","grey"); 
    });
    
    $('.pagination .deer').on("click",function(){
        temp.stop().hide();
        pag.css("background-color","black");
        
        temp=$('img.deer');
        //console.log(pag);
        
        temp.stop().fadeIn(1000);
        pag=$('.pagination .deer').css("background-color","grey"); 
    });
    
    $('.pagination .bird').on("click",function(){
        temp.stop().hide();
        pag.css("background-color","black");
        
        temp=$('img.bird');
      
        //console.log(pag);
        
        temp.stop().fadeIn(1000);
        pag=$('.pagination .bird').css("background-color","grey"); 
    });
    
    $('.pagination .cats').on("click",function(){
        temp.stop().hide();
        pag.css("background-color","black"); 
        
        temp=$('img.cats');
    
        //console.log(pag);
        
        temp.stop().fadeIn(1000);
        pag=$('.pagination .cats').css("background-color","grey"); 
    });
    
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if ((idleTime % 5)===0) { // 5 seconds
        console.log('au trecut 5 secunde ! dam drumul la trenuri',idleTime);
        foolMe();
    }
}
    