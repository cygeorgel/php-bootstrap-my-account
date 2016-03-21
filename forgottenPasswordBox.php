<?php

include_once '_cgGlobal.php';

include_once '_connexionDb.php';

require_once $mailer;


if(isset($_REQUEST['passwordRequestSubmit']) && isset($_REQUEST['userLogin']))
{
	
	
	$userLogin = $_REQUEST['userLogin'];
	

	
	$user = sqlSingleResult("SELECT firstName
		FROM users 
	WHERE login = '$userLogin'");
	
	if(count($user) > 0)
	{
		
		$firstName = $user['firstName'];
		
		$abc= array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", 
		"m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
		$num= array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		
		$requestID = '';
		$requestID .= $abc[rand(0,25)];
		$requestID .= strtoupper($abc[rand(0,25)]);
		$requestID .= $num[rand(0,9)];
		$requestID .= $abc[rand(0,25)];				
		$requestID .= $num[rand(0,9)];
		$requestID .= strtoupper($abc[rand(0,25)]);
		$requestID .= $abc[rand(0,25)];
		$requestID .= $abc[rand(0,25)];
		$requestID .= $abc[rand(0,25)];				
		$requestID .= $num[rand(0,9)];
		$requestID .= strtoupper($abc[rand(0,25)]);
		$requestID .= $num[rand(0,9)];
		$requestID .= $abc[rand(0,25)];				
		$requestID .= $num[rand(0,9)];
		$requestID .= strtoupper($abc[rand(0,25)]);
		$requestID .= strtoupper($abc[rand(0,25)]);
		$requestID .= $abc[rand(0,25)];
		$requestID .= $abc[rand(0,25)];
		$requestID .= $num[rand(0,9)];
		$requestID .= $abc[rand(0,25)];				
		$requestID .= $num[rand(0,9)];
		$requestID .= $abc[rand(0,25)];
		$requestID .= $num[rand(0,9)];
		$requestID .= $abc[rand(0,25)];	
		
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$qInsert = sqlSimpleQuery("INSERT INTO passwordRequests (requestID, login, requestDate, requestIP) VALUES ('$requestID', '$userLogin', CURRENT_TIMESTAMP, '$ip')");
		
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
		
		<p>You requested a new password.</p>
		
		<p>Follow this link in order to define it:</p>
		
		<p></p>
			
		<div class=\"row\">
		  <div class=\"col-sm-4\"></div>
		  <div class=\"col-sm-4\"><a href=\"http://bootstrap-my-account.bluerock.online/nPassword.php?requestID=$requestID\">
		  <button type=\"button\" class=\"btn btn-lg btn-audreco btn-block\">
		  DEFINE A NEW PASSWORD</button></a></div>
		  <div class=\"col-sm-4\"></div>
		<br />
		</div>
		
		<p></p>
		
		<p>Thank you for your trust,</p>
		
		<p>Kind Regards,</p>
		<p><a href=\"http://bluerock.ie/\">BlueRock</a></p>
		</body>
		<html>";
		
		$from = 'noreply@bluerockmail.com';
		$expName = 'BlueRockDESK';

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

		$mail->AddAddress("$userLogin");
		$mail->AddBCC("$productionMail");
		$mail->IsHTML(true);
		$mail->Subject = "$firstName, please define a new password";
		$mail->Body = "$htmlBody";


		if(!$mail->Send())
		{

		}
		else
		{
				
		}
		
		$feedBack = "<div id=\"form\" class=\"alert alert-success\">
		  <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
		  <span class=\"sr-only\">Success:</span>
		  If you have an account, you've received an email with a link 
		  in order to define a new password. 
		  Back to <a href=\"index.php\"> connection page</a>.
		</div>";
		
		print $feedBack;
		
		
	}


}


?>



<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Forgotten password ?</h3>
  </div>
  <div class="panel-body">
      <form class="form-signin" role="form" method="post" action="">
        <h2 class="form-signin-heading">Enter your email address</h2>
		<p>Enter your email address: we are going to send you a link in order to define a new password.</p>	
		<div class="form-group">
        <label for="userLogin" class="sr-only">Email</label>
        <input type="email" id="userLogin" name="userLogin" class="form-control" placeholder="@" required autofocus>
	</div>
        <button class="btn btn-lg btn-special btn-block" 
		type="submit" name="passwordRequestSubmit">Send my request</button>
      </form><br />

  </div><!-- /.panel-body -->
</div>