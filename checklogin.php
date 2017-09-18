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
  <?php
		$sql = "select * from admin where user='".$_POST["textuser"]."' and passwd='".$_POST["textpasswd"]."'";
		$dbquery = mysql_query($sql);	   
		$result= mysql_fetch_array($dbquery);
		if($result) 
		{	
			/*echo $result["userid"];
			echo $result["user"];
			echo $result["passwd"];
			echo $result["color"];
			echo $result["u_status"];*/
			
			$_SESSION["userid"]=$result["userid"];
			$_SESSION["textuser"]=$result["user"];
			$_SESSION["textpasswd"]=$result["textpasswd"];
			$_SESSION["color"]=$result["color"];
			$_SESSION["status"]=$result["u_status"];	
			
			/*$_SESSION["status"]="admin";
			$_SESSION["adminlogin"]=true;*/
			session_write_close();
			header('location:index.php');
		}
		else
		{
			print "<SCRIPT>alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง')</SCRIPT>";
			print "<SCRIPT>window.location='login.php'</SCRIPT>";
		}
?>
</body>
</html>
