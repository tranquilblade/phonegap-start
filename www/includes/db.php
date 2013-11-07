<?php
// Report all PHP errors
//error_reporting(2047); 
//ini_set("display_errors",1);

//Prevent Flex from caching data with IE broswer
//header("Cache-Control: max-age=3600, must-revalidate");

/*--------- DATABASE CONNECTION INFO ---------*/


$server="insys.vmhost.psu.edu";
$mysql_login="avenueHtml5";
$mysql_password="liaojian123";
$database="avenueHtml5";


mysql_connect($server, $mysql_login, $mysql_password);
mysql_select_db($database);


?> 