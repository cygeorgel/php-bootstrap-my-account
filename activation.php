<?php

session_start();

include_once "_cgGlobal.php";

include_once "_connexionDb.php";

include "_header.php";

?>

<body id="page-top">

<div class="container theme-showcase" role="main">

<?php


include "_navbar-nologin.php";

print "<div class=\"page-header\"></div>";


$login = $_REQUEST['a'];
$activationKey = $_REQUEST['k'];

$user = sqlSingleResult("SELECT userID, firstName
	FROM users
WHERE login = '$login' AND activationKey = '$activationKey'");



if(count($user) > O)
{
	$userID = $user['userID'];
	$firstName = $user['firstName'];

	$qUpdate = sqlSimpleQuery("UPDATE users
		SET active = '1', activationDate = CURRENT_TIMESTAMP
	WHERE userID = '$userID'");

	$feedBack = "<div class=\"alert alert-success\" role=\"alert\">
	  <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
	  <span class=\"sr-only\">Success:</span>
	  Welldone $firstName, your just activated your account.
	  You can now connect from <a href=\"index.php\">the login page</a>.
	</div>";

}
else
{
	$feedBack = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
	<span aria-hidden=\"true\">&times;</span></button>
	<strong>Oups :(</strong> We can't activate this account...
	</div>";
}

print $feedBack;


include "_footer.php";

?>

</div> <!-- /container -->

<?php    include '_bootstrap_js.php';    ?>

</body>
