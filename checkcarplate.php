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
		if($_POST["old_Plate"] == "" || $_POST["new_Plate"] == ""){
			print "<script>alert('กรุณาบันทึกข้อมูลในช่องว่าง')</script>";
			print "<SCRIPT>window.location='index.php'</SCRIPT>";
			exit();
		}
		
		$update = "UPDATE car SET carname = '".$_POST["new_Plate"]."' Where carid = '".$_POST["old_Plate"]."'";
		$query = mysql_query($update);
		
		print "<script>alert('Done')</script>";
		print "<script>window.location='permit.php'</script>";
	?>
	
</body>
</html>