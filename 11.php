<!DOCTYPE html>
<html lang="en" xml:lang="en">
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

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//getbootstrap.com/examples/theme/../../dist/js/bootstrap.min.js"></script>
<script src="//getbootstrap.com/examples/theme/../../assets/js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="//getbootstrap.com/examples/theme/../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>