<?php







$form = '';


$form .= "<div class=\"panel panel-default\">";

$form .= "<div class=\"panel-heading\">
	<h3 class=\"panel-title\">Some form (sample)</h3>
</div>";

$form .= "<div class=\"panel-body\">";




$form .= "<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"\">";

$form .= "<div class=\"form-group\">
       		<label for=\"name\" class=\"col-sm-2 control-label\">Company name</label>
        	<div class=\"col-sm-10\">
            <input type=\"text\" class=\"form-control\" id=\"companyName\" name=\"companyName\" placeholder=\"Nom de la société\" value=\"\">
        </div>
    </div>";

$form .= "<div class=\"form-group\">
	        <label for=\"name\" class=\"col-sm-2 control-label\">Name</label>
	        <div class=\"col-sm-10\">
	        <input type=\"text\" class=\"form-control\" id=\"lastName\" name=\"lastName\" placeholder=\"Nom\" value=\"\">
	        </div>
	    </div>";

	
$form .= "<div class=\"form-group\">
		   	<label for=\"name\" class=\"col-sm-2 control-label\">First name</label>
		    <div class=\"col-sm-10\">
		    <input type=\"text\" class=\"form-control\" id=\"firstName\" name=\"firstName\" placeholder=\"Prénom\" value=\"\">
		    </div>
		 </div>";

	
$form .= "<div class=\"form-group\">
			<label for=\"email\" class=\"col-sm-2 control-label\">Email *</label>
			<div class=\"col-sm-10\">
				<input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"@\" value=\"\">
				</div>
			</div>";
			
			
$form .=  "<div class=\"form-group\">
			<label for=\"phone\" class=\"col-sm-2 control-label\">Tel</label>
			<div class=\"col-sm-10\">
				<input type=\"text\" class=\"form-control\" id=\"phone\" name=\"phone\" placeholder=\"Téléphone\" value=\"\">
			</div>
		</div>";
						
			
$form .= "<div class=\"form-group\">
				<label for=\"comment\" class=\"col-sm-2 control-label\">Comment</label>
				<div class=\"col-sm-10\">
			<textarea class=\"form-control\" id=\"comment\" name=\"comment\"></textarea>
		</div>
	</div>";


$form .= "<div class=\"form-group\">

			<div class=\"col-sm-12\">
			
	    		 <input id=\"submit\" name=\"formSubmit\" type=\"submit\" value=\"send the form (just a sample)\" class=\"btn btn-lg btn-special btn-block\">
	        </div>
	    </div>";	

				
				
$form .= "<div class=\"form-group\">
        <div class=\"col-sm-10 col-sm-offset-2\">
            <! Will be used to display an alert to the user>
        </div>
    </div>
</form>";

$form .= "</div>
</div>";




if(isset($_REQUEST['formSubmit']))
{
	
	$companyName = $_REQUEST['companyName'];
	$firstName = $_REQUEST['firstName'];
	$lastName = $_REQUEST['lastName'];
	$phone = $_REQUEST['phone'];
	$email = $_REQUEST['email'];
	$comment = $_REQUEST['comment'];
	
	// Do something...
	
	
	$feedBack = "<div class=\"alert alert-success\" role=\"alert\">
	  <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>
	  <span class=\"sr-only\">Success:</span>
	  Thank you ! Informations has been... (this is just a sample)
	</div>";
	
	
	
		
	print $feedBack;
	
	print $form;
	
}

else
	
{
	
	print $form;
	
}
	 
					 
?> 		