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
    <li><a href="logout.html"><h3>logout</h3></a></li>
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
</div>    <div class='contactView'><!-- <div class="contactView"> -->
    <p>hello , here are  my contact details telephone <b>0763510658</b> , email <b>tudorcatalin2013@yahoo.com</b></p>
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
	
	<p>write a review about my work</p>
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
	
<!-- </div> --><div class='review'><!-- for getting reviews that are approved from databse -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. written by <b>ionel</b> at 2015-07-16-11-47</p><!-- for getting reviews that are approved from databse -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  written by <b>dan</b> at 2015-07-18-11-40</p></div></div><div class='right'><p>welcome , tudor </p>
yeps , picture in progress<img class='login' src=Uploads/profilePicture.jpg></div></div><footer><p>Copyright 2015 @ Tudor Catalin Popa</p>
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