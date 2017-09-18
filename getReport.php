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
<link type="text/css" rel="stylesheet" href="css/base/jquery-ui-1.9.2.custom.css" />
<link type="text/css" rel="stylesheet" href="css/base/jquery-ui-1.9.2.custom.min.css" />

<script src="js/1.8.3/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay1 = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);
			var toDay2 = (d.getFullYear() + 543) + '/' + (d.getMonth() + 1) + '/' + d.getDate();

		    $("#datepicker-th1").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay1, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
			monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
				
			$("#datepicker-th2").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay1, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
			monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
				  
			$("#datepicker-th3").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay1, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
			monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
     		$("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});
		    $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });
			});
</script>  

</head>

<body>
    <form id="form1" name="form1" method="post" action="printReport.php">
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
        
       <? if($_SESSION["status"] == "admin"){ ?>
		<table width="30%" class="loginform" align="center" border='0'>
            <tr >
                <td colspan="4">
                    <div class="info">
                        <p><b>Report</b></p>
                    </div>
                </td>
            </tr>
            <tr >
                <td colspan="4">
                    <div class="info">
                        <font size="-1">กรุณาเลือกวันที่หรือช่วงเวลาที่ต้องการ</font>
                    </div>
                </td>
            </tr>
            <tr>
            	<td>
                	วันที่
                </td>
                <td colspan="3">
                	<input class="indexinput" type="text" name="singleDate" id="datepicker-th1"  />
                </td>
            </tr>
            <tr>
            	<td width="20%">
                	ช่วงเวลา
                </td>
                <td>
                	<input class="indexinput" type="text" name="betweenDate_1" id="datepicker-th2"  />
                </td>
                <td>
                	-
                </td>
                <td witdh="25">
                	<input class="indexinput" type="text" name="betweenDate_2" id="datepicker-th3"  />
                </td>
            </tr>
            <tr>
            	<td>  </td>
            </tr>
            <tr >
                <td colspan="4">
                    <div class="info">
                        <font size="-3" color="red">** หากไม่เลือกวันที่ระบบจะทำการพิมพ์ข้อมูลทั้งหมด **</font>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                <div align="center">
                    <input class="permitbutton" type="submit" name="button1" id="button1" value="ตกลง" />
                    <input class="permitbutton" type="button" name="button2" id="button2" onclick="window.location.href='index.php'" value="กลับ" />
                </div></td>
            </tr>
		</table>
        <? }?>
        
	</form>
</body>
</html>