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
<body>
<?
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

	/*echo "EDIT JOB CHECKING";
	echo "สถานที่:",$_POST["textlocation"]," | ";
	echo "ชื่อลูกค้า:",$_POST["textnamecus"]," | ";
	echo "ชื่อผู้เข้างาน:",$_POST["textemployee"]," | ";
	*/
	$date1 = explode("/",$_POST["textdate"]);
	$starttime = $date1[2]."-".$date1[1]."-".$date1[0];
	/*echo "วันที่เข้างาน:",$_POST["textdate"]," | ","$starttime"," | ";
	echo "เวลาเข้างาน:",$_POST["texttime"]," | ";
	echo "ทะเบียนรถ:",$_POST["textcar"]," | ";
	echo "รายละเอียด:",$_POST["textsubject"];
	echo "subid:",$_POST["textsubid"],"-----------------";*/
	
			
	$sqlser="UPDATE subject SET location='".$_POST["textlocation"]."',
		namecus='".$_POST["textnamecus"]."',
		employee='".$_POST["textemployee"]."',
		starttime='$starttime',
		time_in='".$_POST["texttime"]."',
		carid='".$_POST["textcar"]."',
		subject='".$_POST["textsubject"]."',
		endtime='".DateThai($strDate)."'
		WHERE subid = '".$_POST["textsubid"]."'";
							$queryser=mysql_query($sqlser);

						print "<SCRIPT>alert('แก้ไขข้อมูลเรียบร้อย')</SCRIPT>";
														if($_SESSION["sendDay"] ==""){
						print "<SCRIPT>window.location='index.php'</SCRIPT>";
						}else{
						print "<SCRIPT>window.location='index.php?thisday=".$_SESSION["sendDay"]."'</SCRIPT>";
					}
?>
</body>
</html>