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
<div class="contrainer">
<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->
    <br />
    <br />
    <br />
    <br />
    <br />

        
       <? if($_SESSION["status"] == "admin"){ ?>
       <div id="page" class="container" >
        <div class="row">     
            <div class="col col-md-12 col-sm-12">
            	<div align="center">
                	<h1>ออกรายงาน</h1>
                </div>
			</div>
        </div>
        <div class="row">
			<div class="col col-md-12 col-sm-12">
				<div class="form-group">
                	<div align="center">
                		<input class="btn btn-info" type="button" name="button1" id="button1" value="รายงานรวม" onClick="window.location='report.php';"/>
                    	<input class="btn btn-info" type="button" name="button2" id="button2" value="รายงานรายบุคคล" onClick="window.location='reportuser.php';"/>
                    </div>
				</div>
                <div class="form-group">
                	<div align="center">
                		<input class="btn btn-default" type="button" name="button2" id="button2" onClick="window.location.href='index.php'" value="กลับ" />
                    </div>
				</div>
        	</div>

       <? }?>
           <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
</div>
</body>
</html>