<!DOCTYPE html>
<html lang="en" xml:lang="en">

<?php

$pageTitle = "";
$pageDescription = "";

include '_header.php';

?>



  <body role="document">
	  
    <div class="container theme-showcase" role="main">	
		
		<?php    include "_navbar-nologin.php"; // if required...    ?>
		
		
		<div class="page-header"></div>
		
		
		
		<div class="row">

		  <div class="col-md-6">
	  
      <div class="jumbotron">
        <h1>Be part of it!</h1>
        <p>Give us a few details in the sign-up box.<br />
			You'll receive an email with a link to activate your account within a minute.</p>
      </div>
	
		  </div>
  
		  <div class="col-md-6">
  	
			<?php
	
			include 'signUpForm.php';
	
			?>
	
		  </div>
  
		</div>
		
	  
	  
	  
<?php include '_footer.php';	?>

    </div> <!-- /container -->

<?php    include '_bootstrap_js.php';    ?>

</body>

</html>