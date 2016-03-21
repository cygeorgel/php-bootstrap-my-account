<!DOCTYPE html>
<html lang="en" xml:lang="en">
<?php


include_once '_cgGlobal.php';

include_once '_connexionDb.php';

require_once $mailer;



include "_header.php";

?>
<body id="page-top">
  
<div class="container theme-showcase" role="main">
	
<?php
	

include "_navbar-nologin.php"; // if required...

//	include	"_menu.php"; // if required...


?>


<div class="container theme-showcase" role="main">
	
	
<?php    //include '_carousel.php';    ?>

<div class="jumbotron">
  <h1>Forgotten password...</h1>
  <p><strong>Define a new password</strong></p>
</div>


<?php

$requestID = $_REQUEST['requestID'];


if(isset($_REQUEST['newPasswordRequestSubmit']))
{

	$feedBack = '';
	
	$password = $_REQUEST['password'];
	$passwordConf = $_REQUEST['passwordConf'];
	
	
	
	if((strlen($password) > 5) && ($password == $passwordConf))
	{
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$password = 1;
	}
	else
	{
		$password = '';
		$passwordConf = '';
		$feedBack .= 'the password is not long enough<br />';
	}

	
	
	
	if(strlen($requestID) == 24 && $password == 1)
	{
		
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$client = sqlSingleResult("SELECT login
			FROM passwordRequests
		WHERE requestID = '$requestID'");
		
		$login = $client['login'];
		
		$qUpdate = sqlSimpleQuery("UPDATE users
			SET password = '$hash'
		WHERE login = '$login'");
		
		if(!$qUpdate)
		{
		//	print "QUERY ERROR :( $qInsert<br />";
		}
	
		else
		{
			$user = sqlSingleResult("SELECT firstName
				FROM users 
			WHERE login = '$login'");
			
			$firstName = $user['firstName'];
	
		
			/* email client */	
			$htmlBody = "
			<!DOCTYPE html>
			<html lang=\"fr\" xml:lang=\"fr\">
			<head>
				<meta charset=\"UTF-8\">
				<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"http://audreco.com/css/audreco.css\"/>
			</head>
			<body>
			<div class=\"container theme-showcase\" role=\"main\">
		
			<p>Hello $firstName,</p>
		
			<p>Your password has been changed.</p>
		
			<p>Thank you for your trust,</p>
		
			<p>Kind Regards,</p>
			<p><a href=\"http://bluerock.ie/\">BlueRock</a></p>
			</body>
			<html>";
			

	
			$from = 'hello@audreco-online.com';
			$expName = 'Audreco Online';
	
			$mail = new PHPMailer();
			$mail->CharSet = "UTF-8";
			$mail->IsSMTP();
			$mail->Host = 'in.mailjet.com';
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';	
			$mail->Port = 587; 
			$mail->Username = MAILJET_API_USERNAME;  
			$mail->Password = MAILJET_API_PASSWORD;
			$mail->From = $from;
			$mail->FromName = $expName;

			$mail->AddAddress("$login");
			$mail->IsHTML(true);
			$mail->Subject = "Welldone $firstName, your password has been changed";
			$mail->Body = "$htmlBody";


			if(!$mail->Send())
			{
				//$feedBack =  "The message has not been sent.\n";

			}
			else
			{
		
			}
			
			$feedBack = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
			  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
			  <span class=\"sr-only\">Success:</span>
			Well done $firstName ! 
			</div>";
		

			
			print $feedBack;
		
		}
	}
	
	else
	
	{
		$feedBack = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
		  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
		  <span class=\"sr-only\">Error:</span>
		Could you check your informations
		</div>";
		
		print $feedBack;
		
		include 'nPassword-Form.php';
	}
	
}

else
	
{	
	include 'nPassword-Form.php';
}

include '_footer.php';

?>	  
</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//getbootstrap.com/examples/theme/../../dist/js/bootstrap.min.js"></script>
<script src="//getbootstrap.com/examples/theme/../../assets/js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="//getbootstrap.com/examples/theme/../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>