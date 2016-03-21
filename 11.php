<!DOCTYPE html>
<html lang="en" xml:lang="en">
<?php

include_once '_cgGlobal.php';

include_once '_connexionDb.php';

include '_header.php';

?>

<body role="document">

<div class="container theme-showcase" role="main">

<?php


include '_navbar.php'; // if required...

include	'_menu.php'; // if required...

?>

<div class="page-header"></div>

<?php


if(isset($_REQUEST['v']) && $_REQUEST['v'] == 'spec11')
{
	include 'spec11.php';
}
if(isset($_REQUEST['v']) && $_REQUEST['v'] == 'logout')
{
	include 'logout.php';
}

else
{
	include 'default11.php';
}

include "_footer.php";


?>

</div> <!-- /container -->

<?php    include '_bootstrap_js.php';    ?>

</body>
