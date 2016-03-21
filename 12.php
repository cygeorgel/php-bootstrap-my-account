<!DOCTYPE html>
<html lang="fr" xml:lang="fr">

	<?php
	//
	//  «file»
	//  htdocs
	//
	//  Created by Cyrille Georgel on 2015-08-10.
	//  Copyright 2015 Cyrille Georgel. All rights reserved.
	//

//	include_once "_cgGlobal.php";

//	include_once "_connexionDb.php";

	include "_header.php";

	?>

    <body role="document">

    <div class="container theme-showcase" role="main">

	<?php


	include "_navbar.php"; // comment if not required

	include	"_menu.php"; // comment if not required

	?>

	<div class="page-header"></div>

	<div class="row">

	  <div class="col-md-6">

		  <?php

		  // define what should be displayed in left column :

		  	if(isset($_REQUEST['v']) && $_REQUEST['v'] == 'spec12')
		  	{
		  		include 'spec12_left.php'; // To be replaced by...
		  	}
		  	if(isset($_REQUEST['v']) && $_REQUEST['v'] == 'spec12WithAForm')
		  	{
		  		include 'spec12_left.php'; // To be replaced by...

				include 'someForm.php';
		  	}
		  	else
		  	{
		  		include 'default12_left.php'; // To be replaced by...
		  	}

		  ?>

	  </div><!-- /col-md-6 -->


	  <div class="col-md-6">

	  		  <?php

	  		  // define what should be displayed in right column :

	  		  	if(isset($_REQUEST['v']) && $_REQUEST['v'] == 'spec12')
	  		  	{
	  		  		include 'spec12_right.php';  // To be replaced by...
	  		  	}
	  		  	else
	  		  	{
	  		  		include 'default12_right.php'; // To be replaced by...
	  		  	}

	  		  ?>

	  </div><!-- /col-md-6 -->



	</div><!-- /row -->


	<?php

	include "_footer.php";

	?>

    </div> <!-- /container -->

<?php    include '_bootstrap_js.php';    ?>

</body>
