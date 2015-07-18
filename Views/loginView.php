<!-- login form and links to the register/forgot page-->
 <div class="right">    
    <form action="home.html" method="POST" >
        <fieldset><legend>{{login}}</legend>
        	<p><input type="text" name="username" placeholder="Enter username"></p>
        	<p><input type="password" name="password" placeholder="Enter password"></p>
        	<p><input type="submit" name="submit" value="Login"></p>
        	<p><a href="register.html">Register</a></p>
        	<!-- <p><a href="index.php?page=register">Register</a></p> -->
        	<p><a href="forgot.html">Forgot</a></p>
        	<!-- <p><a href="index.php?page=forgot">Forgot</a></p> -->
        </fieldset>	
    </form>
 </div>    