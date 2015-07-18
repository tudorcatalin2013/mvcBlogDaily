<!-- <div class="contactView"> -->
    <p>hello , here are  my contact details {{contact}}</p>
    <p>Send me an email</p>

	<form action="contact.html" method="post" class="formEmail">
    	<p><input type="text" name="sender" placeholder="introduceti numele"></p>
    	<p><input type="text" name="email" placeholder="introduceti adresa de email"></p>
    	<p><input type="text"
           cols="50" 
           rows="5" 
           style="width250px; height:30px;" 
           name="message" placeholder="want to contact me ? writte me an email "
    	></p>
    	<p><input type="submit" name="submitEmail" value="send email" ></p>
	</form>
	
	<p>{{reviews}}</p>
	<form action="contact.html" method="post" class="formReview">
    	<p><input type="text" name="sender" placeholder="introduceti numele"></p>
    	<p><input type="text" name="email" placeholder="introduceti adresa de email"></p>
    	<p><input type="text"
           cols="50" 
           rows="5" 
           style="width:250px; height:30px;" 
           name="message" placeholder="write your review after working with me "
    	></p>
    	<p><input type="submit" name="submitReview" value="Post review"></p>
	</form>
	
<!-- </div> -->