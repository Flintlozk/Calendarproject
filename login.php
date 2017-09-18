<?
ob_start();
session_start();
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
<form id="form1" name="form1" method="post" action="checklogin.php">
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
                    <img src="./image/Project.png" width="310px" align="center" />
                </div>
            </td>
        </tr>
        <tr>
            <td><input class="loginbutton" type="text" name="textuser" placeholder="ชื่อผู้ใช้งาน" required/></td>
        </tr>
        <tr>
            <td><input class="loginbutton" type="password" name="textpasswd" placeholder="รหัสผ่าน" required/></td>
        </tr>
        <tr>
            <td colspan="2"><div align="center"><input class="submitbutton" type="submit" name="button" id="button" value="Login" /></div></td>
        </tr>
        <tr>
            <? /*<td colspan='2'>
                <div align="center"><a class="alogin" href="register.php">ลงทะเบียน</a></div>
            </td> */
			?>
        </tr>
    </table>
</form>
</body>
</html>
