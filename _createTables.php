<?php
	
include_once '_cgGlobal.php';

include_once '_connexionDb.php';

$createTable = sqlSimpleQuery("CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nbConnections` int(11) NOT NULL,
  `lastConnection` datetime NOT NULL,
  `nbActions` int(11) NOT NULL,
  `lastAction` datetime NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");

if(!$createTable)
{
	print "no query<br />";
}
else
{
	print "query ok<br />";
}
	
?>