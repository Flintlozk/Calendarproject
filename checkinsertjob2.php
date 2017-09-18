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
<title>Untitled Document</title>
</head>

<body background="wall/wall4.jpg" >
<?	
	date_default_timezone_set("Asia/Bangkok"); //ตั้ง timezone
		
				if($_POST["textmake"] == "" || $_POST["textmake"] == "" || $_POST["textlocation"] == "" || $_POST["textemployee"] == "" || $_POST["textdate"] == "" ||$_POST["textcar"] == "" || $_POST["textsubject"] == ""){
					print "<script>alert('กรุณาบันทึกข้อมูลในช่องว่าง')</script>";
					print "<SCRIPT>window.location='index.php'</SCRIPT>";
					exit();
				}
			$sql_show = "select carid,carname from car where carname='".$_POST["textcar"]."' ";
			$result_show = mysql_query($sql_show) or die(mysql_error());
			while($row_show = mysql_fetch_array($result_show)){
				$carid = $row_show["0"];
			}
				
				
				$date = explode("/",$_POST["textdate"]); // dd/mm/yy
				$newdate = $date[2]."-".$date[1]."-".$date[0];
												
				function DateThai($strDate) //แปลง Date/Time = Thai Date/Time
					{
						$strYear = date("Y",strtotime($strDate))+543;
						$strMonth= date("m",strtotime($strDate));
						$strDay= date("j",strtotime($strDate));
						$strHour= date("H",strtotime($strDate));
						$strMinute= date("i",strtotime($strDate));
						$strSeconds= date("s",strtotime($strDate));
						
						return "$strYear-$strMonth-$strDay $strHour:$strMinute:$strSeconds";
					}
					$strDate = date("Y-m-d H:i:s"); //เวลาปัจจุบัน อิงจากเวลา Server
									
					echo $sqlser="insert into subject (namecus,make,location,employee,starttime,endtime,subject,userid,carid,time_in,coor_Latitute,coor_Longitute) 
					values ('".$_POST["textnamecus"]."','".$_POST["textmake"]."','".$_POST["textlocation"]."','".$_POST["textemployee"]."','$newdate','".DateThai($strDate)."','".$_POST["textsubject"]."','".$_POST["userid"]."','$carid','".$_POST["texttime"]."','".$_POST["textlat"]."','".$_POST["textlng"]."')";
					/*$queryser=mysql_query($sqlser);
					print "<SCRIPT>alert('เสร็จเรียบร้อย')</SCRIPT>";
					if($_SESSION["sendDay"] ==""){
						print "<SCRIPT>window.location='index.php'</SCRIPT>";
						}else{
						print "<SCRIPT>window.location='index.php?thisday=".$_SESSION["sendDay"]."'</SCRIPT>";
					;}*/
				
?>
</body>
</html>
