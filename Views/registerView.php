<div class="registerContent">
<p>{{register}}</p>
    <!-- reister form . we upload username image - optional - .using javascript we check information entry. -->
	<form action="register.html" enctype="multipart/form-data" method="POST" name="myForm" onsubmit="return validateForm()">
	    <fieldset><legend>Registration form</legend>
	    	<p><input type="text" name="username" placeholder="Enter username"></p>
	    	<p><input type="password" name="password" placeholder="Enter password"></p>
	    	<p><input type="password" name="password2" placeholder="Re-enter password"></p>
	    	<p><input type="text" name="email" placeholder="Enter email"></p>
	    	<input type="file" name="imageUpload" id="imageUpload">
	    	<p><input type="submit" name="register" value="Register"></p>
	    </fieldset>	
	</form>
</div>