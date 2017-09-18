<?
ob_start();
session_start();
if ($_SESSION["textuser"] == "1") {  
echo "you are logged in";
}
else if ($_SESSION["textuser"] == "") 
{
header ("Location: login.php");
}
require("connect.php");
require("header.php");
?>

<body>
	<form id="form1" name="form1" method="post" action="insertaddcar.php">
    <div class="contrainer">
    <!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->

    <div id="page" class="container" >
        <div class="row">     
            <div class="col col-md-12 col-sm-12">
            	<h2>เพิ่มทะเบียนรถยนต์</h2>
            </div>
        </div> 
        <div class="row">     
            <div class="col col-md-12 col-sm-12">
            	<div class="form-group">
            		<input class="form-control" type="text" name="carname" placeholder="ทะเบียนรถ" />
                </div> 
				<div class="form-group">
                	<div align="center">
            			<input class="btn btn-info" type="submit" name="button" id="button" value="เพิ่ม" />
                    	<input class="btn btn-default" type="button" name="button" id="button" onClick="window.location.href='index.php'" value="กลับ" />
					</div>
                </div>
            </div>
        </div>
     </div>
     </div>
    </form>
</body>
</html>