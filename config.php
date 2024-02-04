<?php
#####################
#Connection Database#
#####################
$dbhost = "localhost";
$dbname = "gom_v5";
$dbuser = "root";
$dbpass = "";

$condb = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
               
			   mysqli_set_charset($condb,"utf8");
 			  /*
			   * Check connection
			   */ 
			   if(mysqli_connect_errno())
			   {
				 echo "Failed to connect to MySQL: " . mysqli_connect_error();
			   }
?>