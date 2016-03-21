<!DOCTYPE html>
<html lang="en" xml:lang="en">

<?php

include_once "_cgGlobal.php";

include_once "_connexionDb.php";

include "_header.php";

?>

<body id="page-top">

<div class="container theme-showcase" role="main">

<?php


include "_navbar-nologin.php"; // if required...

//	include	"_menu.php"; // if required...


?>


<div class="page-header"></div>


<div class="row">

  <div class="col-md-6">

	  <div class="jumbotron">
	    <h1>Welcome!</h1>
	    <p>Please enter your details in the login box.<br />
			Or <strong><a href="signUp.php">create your account for free</a></strong>...</p>
		<p><a class="btn btn-lg btn-special btn-block" href="signUp.php" role="button">Sign up</a>
	  </div>

  </div>

  <div class="col-md-6">

	<?php

	if($_REQUEST['forgottenPassword'] == 1)
	{
		include 'forgottenPasswordBox.php';
	}
	else
	{
		include 'loginBox.php';

		print "<p><strong><a href=\"?forgottenPassword=1\">
			Forgotten password ?</a></strong></p>";
	}

	?>


  </div>

</div>


<?php

include "_footer.php";


?>

</div> <!-- /container -->

<?php    include '_bootstrap_js.php';    ?>

</body>
