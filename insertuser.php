<?
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
	/*echo $_POST["reg_username"];
	echo $_POST["reg_passwd"]; 
	echo $_POST["reg_color"];
	echo $_POST["reg_status"];*/
	
	$sql="select user from admin where user='".$_POST["reg_username"]."'";
	$query = mysql_query($sql);
	$user= mysql_fetch_array($query); 
		
		if($user){
			print "<SCRIPT>alert('ชื่อผู้ใช้งานซ้ำ')</SCRIPT>";
			print "<SCRIPT>window.location='register.php'</SCRIPT>";
			exit();
		  }

			$sqlser="insert into admin (user,passwd,username,color,u_status) values ('".$_POST["reg_username"]."','".$_POST["reg_passwd"]."','".$_POST["username"]."','".$_POST["reg_color"]."','".$_POST["reg_status"]."')";
			$queryser=mysql_query($sqlser);
			
		  	print "<script>alert('ลงทะเบียนเสร็จเรียบร้อย')</script>";
      		print "<script>window.location='login.php'</script>";
		  
	?>

</body>
</html>