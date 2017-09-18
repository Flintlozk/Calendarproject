<?php

$host = "localhost";
$user = "root"; 
$passwd = "1234"; 
$dbname = "calendarproject";
mysql_connect($host,$user,$passwd) or die("ติดต่อ Host ไม่ได้");
mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

function DateThai($strDate) //แปลง Date/Time = Thai Date/Time
					{
						$strYear = date("Y",strtotime($strDate))+543;
						$strMonth= date("m",strtotime($strDate));
						$strDay= date("j",strtotime($strDate));
						$strHour= date("H",strtotime($strDate));
						$strMinute= date("i",strtotime($strDate));
						$strSeconds= date("s",strtotime($strDate));
						
						return "$strDay-$strMonth-$strYear";
					}
					$strDate = date("d-m-Y"); //เวลาปัจจุบัน อิงจากเวลา Server

$strExcelFileName="รายงาน_".$strDate.".xls"; //ชื่อไฟล์
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");
			
	$date1 = explode("/",$_POST["singleDate"]);
	$singleDate = $date1[2]."-".$date1[1]."-".$date1[0];
	
	$date2 = explode("/",$_POST["betweenDate_1"]);
	$beDate_1 = $date2[2]."-".$date2[1]."-".$date2[0];
	$date3 = explode("/",$_POST["betweenDate_2"]); // dd/mm/yy
	$beDate_2 = $date3[2]."-".$date3[1]."-".$date3[0];
	
	if($_POST["singleDate"] == "" && $_POST["betweenDate_1"] == "" && $_POST["betweemDate_2"] == "" ){
			$sql=mysql_query("select username,DATE_FORMAT(starttime,'%d-%m-%Y'),time_in,location,employee,carname,subject,DATE_FORMAT(endtime,'%d-%m-%Y %H:%i:%s'),namecus,make,admin.userid
			from subject,admin,car 
			where subject.userid=admin.userid 
			and subject.carid = car.carid 
			and admin.userid = ".$_POST['textuser_id']."
			order by starttime desc , time_in asc");
		}
		else if($_POST["singleDate"] !="" && $_POST['textuser_id'] != ""){
			$sql=mysql_query("select username,DATE_FORMAT(starttime,'%d-%m-%Y'),time_in,location,employee,carname,subject,DATE_FORMAT(endtime,'%d-%m-%Y %H:%i:%s'),namecus,make,admin.userid  
			from subject,admin,car 
			where subject.userid=admin.userid 
			and subject.carid = car.carid 
			and starttime = '$singleDate' 
			and admin.userid = ".$_POST['textuser_id']."
			order by starttime desc , time_in asc");
			}
			else if($_POST["betweenDate_1"] !="" && $_POST["betweenDate_2"] !="" && $_POST['textuser_id'] != ""){
				$sql=mysql_query("select username,DATE_FORMAT(starttime,'%d-%m-%Y'),time_in,location,employee,carname,subject,DATE_FORMAT(endtime,'%d-%m-%Y %H:%i:%s'),namecus,make,admin.userid
				from subject,admin,car 
				where subject.userid=admin.userid 
				and subject.carid = car.carid 
				and starttime between '$beDate_1' 
				and '$beDate_2' 
				and admin.userid = ".$_POST['textuser_id']."
				order by starttime desc , time_in asc");
				
}
$num=mysql_num_rows($sql);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>

<style>
  <!--table
  @page
     {mso-header-data:"&CMultiplication Table\000ADate\: &D\000APage &P";
	mso-page-orientation:landscape;}
     br
     {mso-data-placement:same-cell;}
  -->
</style>
<? if($_POST["singleDate"] !=""){?> 
            	<strong>รายงานวันที่ <?php echo $_POST["singleDate"];?> ทั้งหมด <?php echo number_format($num);?> รายการ</strong><br>
            <?
			}else if($_POST["betweenDate_1"] !="" && $_POST["betweenDate_2"] !=""){	?>	
				<strong>รายงานวันที่ <?php echo $_POST["betweenDate_1"];?> ถึง <?php echo $_POST["betweenDate_2"];?> ทั้งหมด <?php echo number_format($num);?> รายการ</strong><br> 
			<? }else if($_POST["textuser_id"] !=""){ ?>
            	<strong>รายงานวันที่ <?php echo DateThai($strDate);?> ทั้งหมด <?php echo number_format($num);?> รายการ <br />
			<?	$name = "select username from admin where userid = ".$_POST["textuser_id"]."";
				$result_name=mysql_query($name);
				while($row_name=mysql_fetch_row($result_name)){
            ?>
            	ชื่อผู้ใช้ <?=$row_name["0"]?> <? }?> </strong><br />
					<? }else {?>
                <strong>รายงานวันที่ <? echo DateThai($strDate);?> ทั้งหมด <?php echo number_format($num);?> รายการ</strong><br>
			<? }?>

<br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
    <table x:str border=1 cellpadding=1 cellspacing=1 width=100% style="border-collapse:collapse">
        <tr>
        	<td width="40" align="center" valign="top" ><strong>ลำดับ</strong></td>
            <td width="90" height="30" align="center" valign="top" ><strong>ชื่อผู้ใช้</strong></td>
            <td width="150" align="center" valign="top" ><strong>วันเวลานัดหมาย</strong></td>
            <td width="100" align="center" valign="top" ><strong>บุคคลเข้างาน</strong></td>
            <td width="200" align="center" valign="top" ><strong>รายละเอียดลูกค้า</strong></td>
            <td width="200" align="center" valign="top" ><strong>รายละเอียดเข้างาน</strong></td>
            <td width="140" align="center" valign="top" ><strong>ทะเบียนรถ</strong></td>
            <td width="150" align="center" valign="top" ><strong>วันที่ลงงาน</strong></td>
        </tr>
    <?php
    if($num>0){
        while($row=mysql_fetch_array($sql)){
		$i++
    ?>
        <tr>
        	<td height="auto" align="center" valign="top" ><?=$i;?></td>
            <td height="auto" align="center" valign="top" ><?=$row['0'];?></td>
            <td align="center" valign="top" ><?=$row['1'];?>&nbsp;<?=$row['2'];?> น.</td>
            <td align="center" valign="top"><?=$row['4'];?></td>
            <td align="center" valign="top"><?=$row['8'];?>&nbsp;<?=$row['3'];?></td>
            <td align="center" valign="top"><?=$row['9'];?>&nbsp;<?=$row['6'];?></td>
            <td align="center" valign="top"><?=$row['5'];?></td>
            <td align="center" valign="top"><?=$row['7'];?></td>
        </tr>
    <?php
        }
    }
    ?>
    </table>
</div>

<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>