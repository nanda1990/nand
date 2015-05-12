<?php
/********************************************************************************
* This script is brought to you by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
*********************************************************************************/

//Databse Connection Settings
define ('hostnameorservername','localhost'); //Your hostname or servername goes in here
define ('serverusername','root'); //Your database username goes in here
define ('serverpassword','admin'); //Your database password goes in here
define ('databasenamed','fbl'); //Your database name goes in here

global $connection;
$connection = @mysql_connect(hostnameorservername,serverusername,serverpassword) or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');
@mysql_select_db(databasenamed,$connection) or die('Connection could not be made to the database. Please report this system error at <font color="blue">info@servername.com</font>');	
?>
