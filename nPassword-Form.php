<?php

$form = '';

$form .= "<form id=\"form\" class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"\">";

$form .= "<input type=\"hidden\" name=\"requestID\" value=\"$requestID\" />";

$form .= "<div class=\"form-group\">
<label for=\"password\" class=\"col-sm-3 control-label\">Choose a new password *</label>
<div class=\"col-sm-6\">
	<input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"6 caractères minimum\" value=\"\">
	</div>
</div>";

$form .= "<div class=\"form-group\">
<label for=\"passwordConf\" class=\"col-sm-3 control-label\">Confirm your new password *</label>
<div class=\"col-sm-6\">
	<input type=\"password\" class=\"form-control\" id=\"passwordConf\" name=\"passwordConf\" placeholder=\"\" value=\"\">
	</div>
</div>";

$form .= "<div class=\"form-group\">
<label for=\"button\" class=\"col-sm-3 control-label\"></label>
	<div class=\"col-sm-6\">
		 <input id=\"submit\" name=\"newPasswordRequestSubmit\" type=\"submit\" value=\"Redefine my password\" class=\"btn btn-lg btn-special btn-block\">
    </div>
</div>";		
	
$form .= "</form>";

print $form;

?>