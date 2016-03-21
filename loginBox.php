<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Login</h3>
  </div>
  <div class="panel-body">
      <form class="form-signin" role="form" method="post" action="">
        <h2 class="form-signin-heading">Please sign in</h2>
		
		<div class="form-group">
        <label for="userLogin" class="sr-only">Email address</label>
        <input type="email" id="userLogin" name="userLogin" class="form-control" placeholder="Email address" required autofocus>
	</div>
		
		<div class="form-group">
        <label for="userPassword" class="sr-only">Password</label>
        <input type="password" id="userPassword" name="userPassword" class="form-control" placeholder="Password" required>
	</div>
	
        <button class="btn btn-lg btn-special btn-block" type="loginSubmit" name="loginSubmit">Sign in</button>
      </form><br />
  	<?php
	
  	if($errorLogin == 1)
  	{
  		print $errorLoginAlert;
		
		print $errorType;
  	}
	
  	?>
  </div><!-- /.panel-body -->
</div>