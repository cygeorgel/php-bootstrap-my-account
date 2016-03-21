<?php
/*
Copyright 2015 Cyrille Georgel www.cyrille.me

Licensed under the Apache License, Version 2.0 (the "License"); you may not
use this file except in compliance with the License. You may obtain a copy of
the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
License for the specific language governing permissions and limitations under
the License.

*/
session_start();

if(isset($_SESSION['lastActivity']) && (time() - $_SESSION['lastActivity'] > 1800)) // Logout after 30 min of inactivity
{
    session_unset(); 
    session_destroy(); 
}

$_SESSION['lastActivity'] = time();

include_once '_cgGlobal.php';

include_once '_connexionDb.php';






$errorLogin = 0;


$errorLoginAlert = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
<span aria-hidden=\"true\">&times;</span></button>
<strong>Oups :(</strong> Sounds like something went wrong here...
</div>";


if(!isset($_SESSION['userLogin'])) 
{
	if(isset($_REQUEST['loginSubmit']) || isset($_REQUEST['loginSubmit_x']))
	{
		
		$userLogin = $_REQUEST['userLogin'];
		$userPassword = $_REQUEST['userPassword'];
		
		$auth = sqlSingleResult("SELECT password 
			FROM users 
		WHERE login = '$userLogin' AND active = '1'");
				
		if(count($auth) == 1)
		{	
			if(password_verify($userPassword, $auth['password']))
			{
				$qUpdate = sqlSimpleQuery("UPDATE users 
					SET nbConnections = (nbConnections+1), lastConnection = (CURRENT_TIMESTAMP)
				WHERE userID = '$userID'");
				
				if(!$qUpdate)
				{
					//
				}
				
				$_SESSION['userLogin'] = $userLogin;
				$_SESSION['userID'] = $userID;
				
				include 'core.php';
				
				

			}
			else
			{
				$errorLogin = 1;
				
				$errorType = "<p>password doesn't match</p>";
				
				include 'login.php';
			}
		}
		else
		{
			$errorLogin = 1;
			
			$errorType = "<p>login doesn't match any user</p>";
			
			include 'login.php';
			
		}
	}
	else
	{
		include 'login.php';
	}
}
else
{
	$userLogin = $_SESSION['userLogin'];
	$userID = $_SESSION['userID'];
	
	include 'core.php';
}
		
?>
