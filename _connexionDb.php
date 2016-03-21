<?php


include_once '_cgGlobal.php';


$link = mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE) or die (mysqli_error());


function myVal($val)
{
	
	global $link;
	
	$val = mysqli_real_escape_string($link, $val);
	
	return $val;
}


function sqlManyResults($query)    
{
	global $link;
	
	mysqli_set_charset($link, "utf8");
	
	$data = array();
	$result = mysqli_query($link,$query);

	if(count($result) > 0)
	{
		while($line = @mysqli_fetch_assoc($result))
		{
			$data[] = $line;
		}
	}
	
	@mysqli_free_result($result);

	return $data;
}


function sqlSingleResult($query)
{
	global $link;
	
	mysqli_set_charset($link, "utf8");
	
	$data = array();
	$result = mysqli_query($link,$query);

	if(count($result) > 0)
	{
		$data = @mysqli_fetch_assoc($result);
	}
	
	@mysqli_free_result($result);

	return $data;
}


function sqlSimpleQuery($query)
{
	global $link;
	
	mysqli_set_charset($link, "utf8");
	
	$result = mysqli_query($link,$query);
	
	return $result;
}


?>