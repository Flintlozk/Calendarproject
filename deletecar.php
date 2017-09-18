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
<link type="text/css" rel="stylesheet" href="css/Stylesheet.css" />
</head>

<body>
	<form id="form1" name="form1" method="post" action="checkdeletecar.php">
    <br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
		<table class="loginform" align="center">
        <tr>
            <td colspan="2">
                <div class="info">
                    <p><b>Add Vehicles</b></p>
                </div>
            </td>
        </tr>
        <tr>
            <td witdh="50">
            <select class="loginbutton"  name="get_car">
    	<?
			$sql_show = "select carname from car ";
			$result_show = mysql_query($sql_show) or die(mysql_error());
			?> <option value="" >กรุณาเลือก</option><?
			while($row_show = mysql_fetch_array($result_show)){?>
			 <option value="<? echo $row_show["0"];?>">
			 	<? echo $row_show["0"];?>
             </option>
        <? } ?>
    	</select></td>
        </tr>
        <tr>
            <td colspan="2">
            <div align="center">
            	<input class="permitbutton" type="submit" name="button" id="button" value="ลบ" />
                <input class="permitbutton" type="button" name="button" id="button" onclick="window.location.href='index.php'" value="กลับ" />
            </div></td>
        </tr>
    </table>
    </form>
</body>
</html>