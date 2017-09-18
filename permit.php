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
<form id="form1" name="form1" method="post" action="givepermit.php">
<div class="contrainer">
<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->

	
   <? if($_SESSION["status"] != "admin"){ ?>
	  <table class="loginform" align="center">
      <tr>
        <td>You are not Admin</td>
        </tr>
      </table>
        <?
   }else { ?>
       <div id="page" class="container" >
        <div class="row">     
            <div class="col col-md-12 col-sm-12">
            	<h2>สิทธิ์การใช้งานระบบ</h2>
            </div>
        </div> 
        <div class="row">     
            <div class="col col-md-12 col-sm-12">
            	<div class="form-group">
                	<div class="pull-left">ชื่อผู้ใช้งาน</div>
    				<select class="form-control"  name="get_name">
					<?
                        $sql_show = "select user from admin ";
                        $result_show = mysql_query($sql_show) or die(mysql_error());
            
                        while($row_show = mysql_fetch_array($result_show)){?>
                         <option value="<? echo $row_show["0"];?>">
                            <? echo $row_show["0"];?>
                         </option>
                    <? } ?>
                    </select>
                 </div>
                 <div class="form-group">
                	<div class="pull-left">สิทธิ์</div>
                        <select class="form-control" name="permit">
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                 </div>
        		<div class="form-group">
                	<div align="center">
                 		<input class="btn btn-info" type="submit" name="button" id="button" onClick="return confirm('ยืนยันการแก้ไข')" value="ยืนยัน" />
                		<input class="btn btn-default" type="button" name="button" id="button"  onclick="window.location.href='index.php'" value="กลับ" />
					</div>
                </div>
			</div>
		</div>
	</div>
    <? }?>
    </div>
</form>
</body>
</html>