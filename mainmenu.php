
<div class="mainmenu">
	<div class="onleft">
    <input type="button" name="index" class="indexsubmit3" onclick="window.location='index.php'" value="Calendar Project"/>
    <button type="button" class="indexsubmit3" name="hide" onClick="hideshow()">ซ่อน/แสดงปฏิทิน</button>
    </div>
    
    <div class="onright">
       <? if($_SESSION["status"] == "user"){?>
        <input size='1' class="colorstatus" type="text" style='background-color: <? echo $_SESSION["color"]; ?>' name="usercolor" disabled/> 
            <font size="2"><b>ชื่อผู้ใช้งาน: <?=$_SESSION["textuser"];?>
            </b></font>
       <? }else if($_SESSION["status"] == "admin"){?>
        <input size='1' class="colorstatus" type="text" style='background-color: <? echo $_SESSION["color"]; ?>' name="usercolor" disabled/> 
            <font size="2"><b>ชื่อผู้ใช้งาน: <?=$_SESSION["textuser"];?>
            สถานะ: <?=$_SESSION["status"];?>
            </b></font>
         <? }?>
            
            <? if($_SESSION["status"] == "admin"){?>
            	<input type="button" name="addcar" class="indexsubmit3" onclick="window.location='register.php'" value="สมัครสมาชิก"/>
            	<input type="button" name="addcar" class="indexsubmit3" onclick="window.location='addcar.php'" value="เพิ่มทะเบียนรถ"/>
                <input type="button" name="addcar" class="indexsubmit3" onclick="window.location='carplate.php'" value="แก้ไขทะเบียนรถ"/>
				<input type="button" name="addcar" class="indexsubmit3" onclick="window.location='permit.php'" value="สิทธิ์การใช้งาน"/>
                <input type="button" name="addcar" class="indexsubmit3" onclick="window.location='selectreport.php'" value="ออกรายงาน"/>
            <? }?>
            <input type="button" name="addcar" class="indexlogout" onclick="window.location='logout.php'" value="ลงชื่อออก"/>
    </div>
</div>
<br />
<br />
