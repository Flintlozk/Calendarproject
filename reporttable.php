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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> </title>
        <link type="text/css" rel="stylesheet" href="css/Stylesheet.css" />
    
		<link type="text/css" rel="stylesheet" href="css/base/jquery-ui-1.9.2.custom.css" />
		<link type="text/css" rel="stylesheet" href="css/base/jquery-ui-1.9.2.custom.min.css" />
        
        <link rel="stylesheet" href="css/dataTables/dataTables.css" />
		<link rel="stylesheet" href="css/dataTables/dataTables_themeroller.css" />
        
        <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
 		       
		<script src="js/1.8.3/jquery.min.js"></script> 
        <script type="text/javascript" src="js/1.9.4/jquery.dataTables.min.js"></script>
        
        <script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
        
        <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
		<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>
        

</head>
 
<body>
<? date_default_timezone_set("Asia/Bangkok"); ?>

<!-------------------------------------------------------------- Status -----------------------------------------------------------------> 
<div class="contrainer">
   <form id="form1" name="form1" method="post" action="checkinsertjob.php">
	<div align="right">
                           <? if($_SESSION["status"] == "user"){
                                echo "ชื่อผู้ใช้งาน: " ,$_SESSION["textuser"];
                                //echo " สถานะ: " ,$_SESSION["status"];
                                ?> <input size='1' class="colorstatus" type="text" style='background-color: <? echo $_SESSION["color"]; ?>' name="usercolor" disabled/> <?
                            }else if($_SESSION["status"] == "admin"){
                                echo "ชื่อผู้ใช้งาน: " ,$_SESSION["textuser"];
                                echo " สถานะ: " ,$_SESSION["status"];
                                ?> <input size='1' class="colorstatus" type="text" style='background-color: <? echo $_SESSION["color"]; ?>' name="usercolor" disabled/> 
                            <? }?>
            <? if($_SESSION["status"] == "admin"){?>
           		<a href="index.php">หน้าแรก </a> /
                <a href="addcar.php">เพิ่มรถ </a> /
                <a href="carplate.php">แก้ไขทะเบียนรถ </a> /
                <a href="permit.php">สิทธิ์การใช้งาน</a> / 
                <a href="report.php">รายงานทั้งหมด</a> /
            <? }?>
            <a href="logout.php">ลงชื่อออก</a>

    

</form>
<!-------------------------------------------------------------- Data Table -----------------------------------------------------------------> 
</div>  

<button id="exportExcel" > Export to Excel</button> 
<table width="100%" id="example" class="table">
    <thead>
      <tr>
		<th width="4%"><font size="3">User</font></th>
		<th width="8%"><font size="3">วันเวลานัดหมาย</font></th>
		<th width="6%"><font size="3">บุคคลเข้างาน</font></th>
        <th width="15%"><font size="3">รายละเอียดลูกค้า</font></th>
        <th width="15%"><font size="3">รายละเอียดเข้างาน</font></th>
        <th width="6%"><font size="3">ทะเบียนรถ</font></th>
		<th width="6%"><font size="3">วันที่ลงงาน</font></th>
		<th width="2%" ></th>
        <th width="2%" ></th>
      </tr>
    </thead>
    <tbody>

        <?			

			$sql_show = "select DATE_FORMAT(endtime,'%d-%m-%Y %H:%i:%s') ,location,employee,starttime,subject,subid,admin.userid,color,car.carid,carname,user,time_in,namecus,make,username from subject,admin,car where subject.userid=admin.userid and subject.carid = car.carid";
			

			$result_show = mysql_query($sql_show) or die(mysql_error());
			while($row_show = mysql_fetch_array($result_show)){
		?>	
		<? $date = explode("-",$row_show["3"]); // dd/mm/yy
            $startdate = $date[2]."-".$date[1]."-".$date[0];
                    
            $time = explode(":",$row_show["11"]); // H:i
            $time_in = $time[0].":".$time[1];	
            
            $timestamp = $row_show["0"];
            $splitTimeStamp = explode(" ",$timestamp);
            $rowtime1 = $splitTimeStamp[0];
            $rowtime2 = $splitTimeStamp[1];
            
            $carlicense = $row_show["9"];
            $splitcarlicense = explode(" ",$carlicense);
            $carli_1 = $splitcarlicense[0];
            $carli_2 = $splitcarlicense[1];
        ?>
        
        
           
		<tr bgcolor="<? echo $row_show["7"]?> ">  
                
            <td><font size="2"><div align="center"><?=$row_show["14"];//user?></div></font></td>
            <td><font size="2"><div align="center"><?=$startdate;//วันที่เข้างาน?>&nbsp;<?=$time_in;//เวลาเข้างาน?>&nbsp;น.</div></font></td> 
            <td><font size="2"><?=$row_show["2"];//บุคคลเข้างาน?></font></td>
            <td><font size="2"><?=$row_show["12"];//ชื่อลูกค้า?>&nbsp;<?=$row_show["1"];//สถานที่?></font></td>  
            <td><font size="2"><?=$row_show["13"];//วัตถุประสงค์เข้างาน?>&nbsp;<?=$row_show["4"];//รายละเอียดเข้างาน?></font></td>	
            <td><font size="2"><div align="center"><?=$carli_1?><?=$carli_2//ทะเบียนรถ(carname)?></div></font></td>
            <td><font size="2"><div align="center"><?=$rowtime1//วันที่ลงงาน?></div></font></td><? //=$rowtime2//เวลาลงงาน?>
            <td><font size="2"><div align="center"> 
                	<? if($_SESSION["status"] == "admin"){?>
                    	<a href="editjob.php?subid=<?=$row_show["5"]?>">
                    		<img src="./image/edit.png" width="20px" hieght="20px"align="center">
                   		</a>
 					<? }else if($_SESSION["status"] == "user" && $_SESSION["userid"] == $row_show["6"]){?> 
                      	<a href="editjob.php?subid=<?=$row_show["5"]?>">
                   			<img src="./image/edit.png" width="20px" hieght="20px"align="center">
                     	</a>
					<? } ?>
				</div>
			</td>
             <td>
             	<div align="center"> 
                	<? if($_SESSION["status"] == "admin"){?>
                    	<a onClick="return confirm('ต้องการลบงานหรือไม่')" href="deletejob.php?subid=<?=$row_show["5"]?>">
                    		<img src="./image/delete.png" width="20px" hieght="20px"align="center">
                   		</a>
 					<? }else if($_SESSION["status"] == "user" && $_SESSION["userid"] == $row_show["6"]){?> 
                      	<a onClick="return confirm('ต้องการลบงานหรือไม่')" href="deletejob.php?subid=<?=$row_show["5"]?>">
                   			<img src="./image/delete.png" width="20px" hieght="20px"align="center">
                     	</a>
					<? } ?>
				</div>
        	</td>
    	</tr>
	<? } ?>
    </tbody>
    <tfoot>
        <tr>
        	
            <th><font size="3">User</font></th>
            <th><font size="3">วันเวลานัดหมาย</font></th>
            <th><font size="3">บุคคลเข้างาน</font></th>
            <th><font size="3">รายละเอียดลูกค้า</font></th>
            <th><font size="3">รายละเอียดเข้างาน</font></th>
            <th><font size="3">ทะเบียนรถ</font></th>
            <th><font size="3">วันที่ลงงาน</font></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>
    </div>

<!-------------------------------------------------------------- misc ------------------------------------------------------------------------->

<!----------------------------------------------------- Call Datatable Script ----------------------------------------------------------------->
<script type="text/javascript">
$(document).ready(function(){
//    $('#example').dataTable();
    oTable = $('#example').dataTable({
        "bJQueryUI": true,
		"iDisplayLength": 50,
        "sPaginationType": "full_numbers"
    }); 
});
</script>

<!--------------------------------------------------------Sort Table by fnSort----------------------------------------------------------------->
<script>
$(document).ready(function() {
     var oTable = $('#example').dataTable();
     // Sort immediately with columns 0 and 1
     oTable.fnSort( [[1,'asc']] );
   } );
</script>

<script type="text/javascript">
    jQuery(function ($) {
        $("#exportExcel").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#example",
                schema: {
                    type: "table",
                    fields: {
                       	User: { type: String },
						วันเวลานัดหมาย: { type: String },
						บุคคลเข้างาน: { type: String },
						รายละเอียดลูกค้า: { type: String },
                       	รายละเอียดเข้างาน: { type: String },
						ทะเบียนรถ: { type: String },
                        วันที่ลงงาน: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to Excel
            dataSource.read().then(function (data) {
                new shield.exp.OOXMLWorkbook({
                    author: "SGD Intertrading",
                    worksheets: [
                        {
                            name: "SGD Intertrading Project Report",
                            rows: [
                                {
                                    cells: [
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "User"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "วันเวลานัดหมาย"
                                        },
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "บุคคลเข้างาน"
                                        },
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "รายละเอียดลูกค้า"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "รายละเอียดเข้างาน"
                                        },
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "ทะเบียนรถ"
										},
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "วันที่ลงงาน"
										}
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
										{ type: String, value: item.User },
										{ type: String, value: item.วันเวลานัดหมาย },
										{ type: String, value: item.บุคคลเข้างาน },
										{ type: String, value: item.รายละเอียดลูกค้า },
                                        { type: String, value: item.รายละเอียดเข้างาน},
                                        { type: String, value: item.ทะเบียนรถ },
										{ type: String, value: item.วันที่ลงงาน }
                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "Excel"
                });
            });
        });
    });
</script>



</body>
</html>
