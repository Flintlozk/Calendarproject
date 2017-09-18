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
    <form id="form1" name="form1" method="post" action="printReportuser.php">
    <div class="contrainer">
    <!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->
       <? if($_SESSION["status"] == "admin"){ ?>
       	<div id="page" class="container" >
        <div class="row">     
            <div class="col col-md-12 col-sm-12">
            	<div class="pull-left">
                	<h1>ออกรายงานรายบุคคล</h1>
                </div>
			</div>
        </div>
        <div class="row">
			<div class="col col-md-12 col-sm-12">
            	<div class="form-group">
                    <div class="pull-left">รายบุคคล</div>
                    <select class="form-control" name="textuser_id" required>
                		<option value=""></option>
							<?
                            $sql = "select * from admin order by u_status desc , user asc";
                            $result = mysql_query($sql) or die(mysql_error());;
                            while($row = mysql_fetch_array($result)){
                            ?>
                		<option value="<?=$row["userid"]?>"><? echo $row["user"]," | ",$row["username"];?></option>
							<? }?>
                	</select>
               	</div>
            	
				<div class="form-group">
                    <div class="pull-left">วันที่</div>
                        <input class="form-control" type="text" name="singleDate" id="datepicker-th1"  />
                </div>
                <br>
                <div class="form-group">
                    <div class="pull-left">ช่วงวันที่</div>
                        <input class="form-control"	 type="text" name="betweenDate_1" id="datepicker-th2"  />
                            ถึง
                        <input class="form-control" type="text" name="betweenDate_2" id="datepicker-th3"  />
                    </div>
                </div>
                <div class="form-group">
                	<div align="center">
                      	<font size="-3" color="red">** หากไม่เลือกวันที่ระบบจะทำการพิมพ์ข้อมูลทั้งหมด **</font><br>
						<input class="btn btn-info" type="submit" name="button1" id="button1" value="ตกลง" />
                   		<input class="btn btn-default" type="button" name="button2" id="button2" onClick="window.location.href='selectreport.php'" value="กลับ" />
                    </div>
				</div>
        	</div>


        <? }?>
        </div>
	</form>
</body>
</html>