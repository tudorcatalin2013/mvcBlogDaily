<!DOCTYPE html>
<html>
<head>
    <title>this is my new blog's title</title>
    <link rel="stylesheet" type="text/css" href="css/myStyle.css">
    <link href="css/hover.css" rel="stylesheet" media="all">
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div id="container"><div class='menu'><!-- creates links for the menu -->
    <li><a href="home.html"><h3>home</h3></a></li>
<!-- creates links for the menu -->
    <li><a href="about.html"><h3>about</h3></a></li>
<!-- creates links for the menu -->
    <li><a href="contact.html"><h3>contact</h3></a></li>
<!-- creates links for the menu -->
    <li><a href="another.html"><h3>another</h3></a></li>
<!-- creates links for the menu -->
    <li><a href="login.html"><h3>login</h3></a></li>
<!-- creates links for the menu -->
    <li><a href="collegues.html"><h3>collegues</h3></a></li>
</div><div class='main'><!-- two buttons , for showing time,stoping time and a few links -->
<div class="left">    
    <p>here is the left side  </p>
    <p id="demo">Clock</p>
    <p><button id="btnStart">Start time</button></p>
	<p><button id="btnStop">Stop time</button></p>
	<p><a href="http://www.google.com">Google</a></p>
	<p><a href="http://www.gmail@yahoo.com">Check your Gmail Account</a></p>	
	<p><a href="http://www.facebook.com">Check your Facebook Account</a></p>
	<p><a href="https://www.linkedin.com">Check your LinkedIn Account</a></p>
	
<!-- <div class="fb-post" data-href="https://www.facebook.com/photo.php?fbid=121222864880263&amp;set=a.121222941546922.1073741827.100009776500583&amp;type=1&amp;theater" data-width="350"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/photo.php?fbid=121222864880263&amp;set=a.121222941546922.1073741827.100009776500583&amp;type=1">Posted by <a href="https://www.facebook.com/tudor.catalin.904">Tudor Catalin</a> on&nbsp;<a href="https://www.facebook.com/photo.php?fbid=121222864880263&amp;set=a.121222941546922.1073741827.100009776500583&amp;type=1">Wednesday, July 1, 2015</a></blockquote></div></div> -->
</div>    <div class="center">
    <p>some random text . You must login to comment, view reviews , or contact me !Also here is the<b> center</b> class </p>
</div>    <!-- login form and links to the register/forgot page-->
 <div class="right">    
    <form action="home.html" method="POST" >
        <fieldset><legend>Login form</legend>
        	<p><input type="text" name="username" placeholder="Enter username"></p>
        	<p><input type="password" name="password" placeholder="Enter password"></p>
        	<p><input type="submit" name="submit" value="Login"></p>
        	<p><a href="register.html">Register</a></p>
        	<!-- <p><a href="index.php?page=register">Register</a></p> -->
        	<p><a href="forgot.html">Forgot</a></p>
        	<!-- <p><a href="index.php?page=forgot">Forgot</a></p> -->
        </fieldset>	
    </form>
 </div>    </div><footer><p>Copyright 2015 @ Tudor Catalin Popa</p>
	    <!-- div for the facebook like butoon -->
	    <div class="fb-like" 
	    	data-href="http://128.199.36.184/workspace/tpopa/mvc/home.html" 
	    	data-layout="standard" 
	    	data-action="like" 
	    	data-show-faces="true" 
	    	data-share="true">
	    </div>
	    <!-- div for the facebook follow butoon -->
	    <div class="fb-follow" 
	    	data-href="https://www.facebook.com/tudor.catalin.904" 
	    	data-layout="standard" 
			data-show-faces="true">
		</div>
</footer>
<!-- open the jquery library for the slidder :) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="Js/myJavascript2.js"></script>

</div>
</body>
</html>