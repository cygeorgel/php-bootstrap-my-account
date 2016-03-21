<?php
//
//  «file»
//  htdocs
//
//  Created by Cyrille Georgel on 2015-08-10.
//  Copyright 2015 Cyrille Georgel. All rights reserved.
//
ini_set('error_reporting', E_ERROR);
ini_set('display_errors','On'); 

include_once 'cgGlobal.php';

include_once 'connexionDb.php';

$qCreateTable = "CREATE TABLE IF NOT EXISTS `users` (
  `userID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `nbConnections` int(11) NOT NULL,
  `lastConnection` datetime NOT NULL,
  `nbActions` int(11) NOT NULL,
  `lastAction` datetime NOT NULL,
  PRIMARY KEY (`userID`),
  FULLTEXT KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;";

if($mysqli->query($qCreateTable) === TRUE)
{
	// We create the table if not exists
}

	
if($result = $mysqli->query("SELECT userID FROM users"))
{
	$num_rows = $result->num_rows;
}

if($num_rows == 0)
{
	if($mysqli->query("INSERT INTO `users` (`login`, `email`, `password`) VALUES
('cyrille', 'cyrille.georgel@gmail.com', '1234')") === TRUE)
	{
		// we insert at least one user for tests...
	}
	
}

?>