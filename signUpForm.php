<?php
//
//  signUpForm.php
//  bluerockdesk
//
//  Created by Cyrille Georgel on 2016-03-16.
//  Copyright 2016 Cyrille Georgel. All rights reserved.
//

include_once '_cgGlobal.php';

include_once '_connexionDb.php';

require_once $mailer;



$form = '';


$form .= "<div class=\"panel panel-default\">
<div class=\"panel-heading\">
<h3 class=\"panel-title\">Create my free account...</h3>
</div>
<div class=\"panel-body\">";


$form .= "<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"\">";

/*
$form .= "<div class=\"form-group\">
<label for=\"name\" class=\"col-sm-3 control-label\">Company</label>
<div class=\"col-sm-9\">
<input type=\"text\" class=\"form-control\" id=\"companyName\" name=\"companyName\" placeholder=\"Company name\" value=\"\">
</div>
</div>";
*/


$form .= "<div class=\"form-group\">
<label for=\"name\" class=\"col-sm-3 control-label\">Last name*</label>
<div class=\"col-sm-9\">
<input type=\"text\" class=\"form-control\" id=\"lastName\" name=\"lastName\" placeholder=\"Last name\" value=\"\">
</div>
</div>";


$form .= "<div class=\"form-group\">
<label for=\"name\" class=\"col-sm-3 control-label\">First name</label>
<div class=\"col-sm-9\">
<input type=\"text\" class=\"form-control\" id=\"firstName\" name=\"firstName\" placeholder=\"First name\" value=\"\">
</div>
</div>";


$form .= "<div class=\"form-group\">
<label for=\"email\" class=\"col-sm-3 control-label\">Email *</label>
<div class=\"col-sm-9\">
<input type=\"email\" class=\"form-control\" id=\"emailAddress\" name=\"emailAddress\" placeholder=\"@\" value=\"\">
</div>
</div>";
			
			
$form .= "<div class=\"form-group\">
<label for=\"password\" class=\"col-sm-3 control-label\">Password *</label>
<div class=\"col-sm-9\">
<input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"\" value=\"\">
</div>
</div>";


$form .= "<div class=\"form-group\">
<label for=\"password\" class=\"col-sm-3 control-label\">Confirmation *</label>
<div class=\"col-sm-9\">
<input type=\"password\" class=\"form-control\" id=\"passwordConf\" name=\"passwordConf\" placeholder=\"\" value=\"\">
</div>
</div>";
				
/*			
$form .= "<div class=\"form-group\">
<label for=\"comment\" class=\"col-sm-3 control-label\">Comment</label>
<div class=\"col-sm-9\">
<textarea class=\"form-control\" id=\"comment\" name=\"comment\"></textarea>
</div>
</div>";
*/

$form .= "<div class=\"form-group\">
<div class=\"col-sm-12\">
 <input id=\"submit\" name=\"formSubmit\" type=\"submit\" value=\"Create my free account\" class=\"btn btn-lg btn-special btn-block\">
</div>
</div>";
			

$form .= "</div><!-- /.panel-body -->
</div>";




if(isset($_REQUEST['formSubmit']))
{
	
	$companyName = $_REQUEST['companyName'];
	$firstName = $_REQUEST['firstName'];
	$lastName = $_REQUEST['lastName'];
	$phone = $_REQUEST['phone'];
	$emailAddress = $_REQUEST['emailAddress'];
	$password = $_REQUEST['password'];
	$passwordConf = $_REQUEST['passwordConf'];
	$comment = $_REQUEST['comment'];
	
	
	if((strlen($password) > 5) && ($password == $passwordConf))
	{
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$password = 1;
	}
	
	else
	
	{
		$password = '';
		$passwordConf = '';
		$feedBack .= 'le mot de passe doit contenir au moins 6 caractères<br />';
	}
	
	
	if($lastName != '' && $emailAddress != '' && $password == 1)
	{
		
		$auth = sqlSingleResult("SELECT userID FROM users WHERE login = '$emailAddress'");
				
		if(count($auth) == 0)
		{	

			$num = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
			$abc = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
				
			$activationKey = '';
			$activationKey .= $abc[rand(0,25)];
			$activationKey .= strtoupper($abc[rand(0,25)]);
			$activationKey .= $num[rand(0,9)];
			$activationKey .= $abc[rand(0,25)];				
			$activationKey .= $num[rand(0,9)];
			$activationKey .= strtoupper($abc[rand(0,25)]);
			$activationKey .= $abc[rand(0,25)];
			$activationKey .= $abc[rand(0,25)];
			$activationKey .= $abc[rand(0,25)];				
			$activationKey .= $num[rand(0,9)];
			$activationKey .= strtoupper($abc[rand(0,25)]);
			$activationKey .= $num[rand(0,9)];
			$activationKey .= $abc[rand(0,25)];				
			$activationKey .= $num[rand(0,9)];
			$activationKey .= strtoupper($abc[rand(0,25)]);
			$activationKey .= strtoupper($abc[rand(0,25)]);
			$activationKey .= $abc[rand(0,25)];
			$activationKey .= $abc[rand(0,25)];
			$activationKey .= $num[rand(0,9)];
			$activationKey .= $abc[rand(0,25)];				
			$activationKey .= $num[rand(0,9)];
			$activationKey .= $abc[rand(0,25)];
			$activationKey .= $num[rand(0,9)];
			$activationKey .= $abc[rand(0,25)];	
			
		
			$hash = password_hash($password, PASSWORD_DEFAULT);
	
		
			$emailAddress = myVal($emailAddress);
			$companyName = myVal($companyName);
			$firstName = myVal($firstName);
			$lastName = myVal($lastName);
			$comment = myVal($comment);
		
			$qInsert = sqlSimpleQuery("INSERT INTO users (login, emailAddress, password, activationKey, companyName, firstName, lastName, Comment) VALUES ('$emailAddress', '$emailAddress', '$hash', '$activationKey', '$companyName', '$firstName', '$lastName', '$comment')");
			
			
			
			
		

			$htmlBody = "
			<html>	
			<head>
				<meta charset=\"UTF-8\">
				<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\"
				href=\"$mainCSS\"/>
			</head>
			
			<body>
			<p>Hello $firstName,</p>
			<p>Welldone, you're in :)</p>
			<p>Before connecting with your email address and the password you choosed, 
			you must activate your account by following the link :</p>
			
			<div class=\"row\">
			  <div class=\"col-sm-4\"></div>
			  <div class=\"col-sm-4\"><a href=\"http://bootstrap-my-account.bluerock.online/activation.php?a=$emailAddress&amp;k=$activationKey\"><button type=\"button\" class=\"btn btn-lg btn-special btn-block\">ACTIVATE MY ACCOUNT</button></a></div>
			  <div class=\"col-sm-4\"></div>
			<br />
			</div>
			
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
			$mail->AddAddress("$emailAddress");
			$mail->IsHTML(true);
			$mail->Subject = "BlueRockDESK";
			$mail->Body = "$htmlBody";
			
			
			if(!$mail->Send())
			{
				//$feedBack =  "The message has not been sent.\n";

			}
			else
			{
				$feedBack = "<div class=\"alert alert-success\" role=\"alert\">
				  <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
				  <span class=\"sr-only\">Success:</span>
				  Welldone $firstName, you're in :) Check your emails now...
				</div>";
			}
			
			print $feedBack;
			
		}
		
		else
		
		{
			
			$feedBack = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			<span aria-hidden=\"true\">&times;</span></button>
			<strong>Oups :(</strong> This login is already used...
			</div>";
		
			print $feedBack;
		
			print $form;
			
		}
	}
	
	else
	
	{
		
		$feedBack = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
		<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
		<span aria-hidden=\"true\">&times;</span></button>
		<strong>Oups :(</strong> Please verify your details...
		</div>";
		
		print $feedBack;
		
		print $form;
		
	}
	
	
}

else
	
{
	
	print $form;

}
	 
					 
?> 					  