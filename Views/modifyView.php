<div class="modify">
    <!-- open form for modifying username,password,or email-->
    <form action="modify.html" method="POST" >
        <fieldset><legend>{{modify}}</legend>
            <p><input type="text" name="id" placeholder="Enter id of record to modify"></p>
        	<p><input type="text" name="username" placeholder="Enter username"></p>
        	<p><input type="password" name="password" placeholder="Enter password"></p>
        	<p><input type="text" name="email" placeholder="Enter email"></p>
        	<p><input type="submit" name="modify" value="Modify"></p>
        	
        	<p><a href="delete.html">Delete</a></p>

        </fieldset>	
    </form>
</div>