$( document ).ready(function() {
    
    $(".button1Ajax").on("click", function(){
       $.ajax({
           url: "Ajax/get-students-list.php", 
           success: function(data){
               var i, last, student, content;
               
               content = "";
               for(i =0, last = data.length; i<last;i++){
                   student = data[i];
                   content += "<div class='studentAjax' data-id='"+ student.id +"'>" 
                                + student.fname + " " + student.lname 
                                + " <a href='#' class='deleteAjax'>Delete</a>"
                                + "</div>";
               }
        
               $(".contentAjax").html(content);
               
               $(".deleteAjax").on("click", function(e){
                   var student = $(this).parent(),
                   student_id = student.data('id');
                   
                   $.ajax({
                        url: "Ajax/delete-student.php",
                        data: {id: student_id},
                        method: "POST"
                    });
                    
                    student.remove();
                   
                   e.preventDefault();
               });
               
           }
       });
    });
    
    $("#submit-student-form").on("submit", function(e){
        
        e.preventDefault();
        $.ajax({
                url: "Ajax/add-student.php",
                data: $("#submit-student-form").serialize(),
                // data: {
                //     fname: $("#fname").val(),
                //     lname: $("#lname").val()
                // },
                method: "POST",
                success: function(){
                    
                    $(".button1Ajax").trigger('click');
                }
            });
   
    }); 
});