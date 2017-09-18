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
<?

			$sql="delete from subject where subid='".$_GET["subid"]."'";
			$query=mysql_query($sql);
			print "<SCRIPT>alert('Success')</SCRIPT>";
											if($_SESSION["sendDay"] ==""){
						print "<SCRIPT>window.location='index.php'</SCRIPT>";
						}else{
						print "<SCRIPT>window.location='index.php?thisday=".$_SESSION["sendDay"]."'</SCRIPT>";
					}

?>
<body>
</body>
</html>
