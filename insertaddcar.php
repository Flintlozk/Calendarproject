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
        echo $_POST["carname"];
		
		$sql="select carname from car where carname='".$_POST["carname"]."'";
		$query = mysql_query($sql);
		$user= mysql_fetch_array($query); 
		
		if($user){
			print "<SCRIPT>alert('ทะเบียนรถซ้ำ')</SCRIPT>";
			print "<SCRIPT>window.location='addcar.php'</SCRIPT>";
			exit();
		  }
		  	$sqlser="insert into car (carname) values ('".$_POST["carname"]."')";
			$queryser=mysql_query($sqlser);
			
		  	print "<script>alert('Done')</script>";
      		print "<script>window.location='addcar.php'</script>";
    ?>
</body>
</html>