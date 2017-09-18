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
<form id="form1" name="form1" method="post" action="insertuser.php">
<div class="contrainer">
<?php include 'mainmenu.php';?>

	
    <?

	do{
	function random_color_part() { //สุ่มสี อ่อน (150-255)
  	  return str_pad( dechex( mt_rand( 150, 255 ) ), 2, '0', STR_PAD_LEFT);
	}
	function random_color() { //แปลงเป็น code สี #xxxxx
    	return "#" . random_color_part() . random_color_part() . random_color_part();
	}
	$rgbcolor = random_color();
		 //$sqlcolor="select color from admin where color='".$rgbcolor."'";
		 $sqlcolor="select color from admin where color='".$rgbcolor."'";
		 $resultcolor = mysql_query($sqlcolor) or die(mysql_error());
		 while($row= mysql_fetch_array($resultcolor)){
			 echo $row[0];
	 }
	} while ($rgbcolor == $row[0]);
	
	?>
    <? if($_SESSION["status"] == 'admin'){?>


    <div id="page" class="container" >
        <div class="row">     
            <div class="col col-md-12 col-sm-12">
                
                    <h2>สมัครสมาชิก</h2>
                
            </div>
        </div>    
        <div class="row"> 
            <div class="col col-md-12 col-sm-12">
            <div class="form-group">
                <div class="pull-left">ชื่อผู้ใช้งาน</div>
                <input class="form-control" type="text" name="username" placeholder="ชื่อผู้ใช้งาน" required/>
                <input type="hidden" name="reg_status" value="user"/>
            </div>  
            <div class="form-group">                   
                <div class="pull-left">ชื่อล็อกอิน</div>
                <input class="form-control" type="text" name="reg_username" placeholder="ชื่อผู้ใช้งาน" required/>
                <input type="hidden" name="reg_status" value="user"/>
            </div> 
            <div class="form-group">                   
                <div class="pull-left">รหัสผ่าน</div>
                <input class="form-control" type="password" name="reg_passwd" placeholder="รหัสผ่าน" required/></td>
            </div> 
            <div class="form-group">                
                <div class="pull-left">Color</div>
                <input class="form-control" type="color"  maxlength="7" name="show_color" value="<? echo strtoupper($rgbcolor); ?>" disabled/>
                <input type="hidden" maxlength="7" name="reg_color" value="<? echo strtoupper($rgbcolor); ?>" /></td>
            </div> 
            <div class="form-group"> 
                <div align="center">
                <input class="btn btn-info" type="submit" name="button" id="button" value="ลงทะเบียน" />
                </div>
            </div>
        </div>
    </div>

  
</div>
    </form>
    <? }?>
    <? if($_SESSION["status"] == 'user'){?>
    	
        <div align="center">
        	กรุณาติดต่อแอดมินเพื่อสมัครสมาชิก
        </div>
        <input class="submitbutton" type="button" name="button" id="button" onClick="window.history.back()"value="กลับ" />
    
    <? } ?>
<br />

</body>
</html>