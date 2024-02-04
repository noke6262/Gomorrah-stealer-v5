<?php 
include('header.php');

?>
<script>

window.onload=function(){
document.getElementById("textarea1").wrap='off';
}
function NetscapeToJson(){
var textArea2 = document.getElementById("textarea2");
textArea2.value = '';
var arrObjects = [];
var textArea1 = document.getElementById("textarea1");
var arrayOfLines = textArea1.value.split("\n");
var i = 0;
for (i=0; i<arrayOfLines.length; i++){
var kuka = arrayOfLines[i].split("\t");
var cook = new Object();
cook.domain = kuka[0];
cook.expirationDate = parseInt(kuka[4]);

if (kuka[1] == "FALSE") cook.httpOnly = false;
if (kuka[1] == "TRUE") cook.httpOnly = true;

cook.name = kuka[5];
cook.path = kuka[2];

if (kuka[3] == "FALSE") cook.secure = false;
if (kuka[3] == "TRUE") cook.secure = true;

cook.value = kuka[6];

arrObjects[i] = cook;
}

var cookieStr = JSON.stringify(arrObjects);

textArea2.value = cookieStr;

}
</script>
	
    
    <!--end content-->

		
		
		
		 
		 <div class="col-md-12">
               <div class="panel-default" style="opacity: 0.8;background-image: linear-gradient(to bottom,#232323 0,#232323 100%);">
				<div class="panel-body table-bordered" style="font-size:14px; padding-left:40px;padding-right:40px;padding-bottom:25px;padding-top:25px;">
				
				<h2>Cookies Converter</h2>
                   <h3>NETSCAPE: </h3>
                    <textarea id="textarea1" wrap="off" rows="20" style="color: green;width: 100%" onclick="this.select()"></textarea>
                    <br>
                    <button onclick="NetscapeToJson()" class="btn-blue"> Convert -&gt; To Json </button>
                    <br>
                    <br>
                    <h3>JSON: </h3>
                    <textarea id="textarea2" wrap="soft" rows="20" style="color: green;width: 100%" onclick="this.select()"></textarea>



		</table>
		 
		 
		 </div>



		</div>

<?php include('footer.php');?>