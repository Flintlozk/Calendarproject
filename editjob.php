<?
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
        <script type="text/javascript" src="js/1.9.4/jquery.dataTables.min.js"></script>
        
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
			
			$("#datepicker-th2").datepicker({ dateFormat: 'yy/mm/dd', isBuddhist: true, defaultDate: toDay2, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
     		$("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});
		    $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });
			});
		</script>    
</head>
<body>
  <div class="contrainer">
	<form method="post" action="editjobcheck.php">	
    
<?
		$sql_show = "select DATE_FORMAT(endtime,'%d-%m-%Y %H:%i:%s') ,location,employee,starttime,subject,subid,admin.userid,color,car.carid,carname,user,time_in,namecus,make 
		from subject,admin,car 
		where subject.userid=admin.userid 
		and subject.carid = car.carid 
		and subid = '".$_GET["subid"]."'";
		
			$result_show = mysql_query($sql_show) or die(mysql_error());
			$row_show = mysql_fetch_array($result_show);
?>
    
        <table class="tableindex" width="40%" align="center" name='table1' border='0'>
            <tr>
                <td colspan="2">
                    <div align="center">
                        <p><b>แก้ไข</b></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="right">สถานที่</td>
                <td><input class="indexinput" type="text" name="textlocation" value="<?=$row_show["location"] ?>"/></td>
            </tr>
            <tr>
                <td align="right">ชื่อลูกค้า</td>
                <td><input class="indexinput" type="text" name="textnamecus" value="<?=$row_show["namecus"] ?>"/></td>
            </tr>
             <tr>
                <td align="right">วัตถุประสงค์เข้างาน</td>
                <td>
                    <select class="indexinput"  name="textmake" value="<?=$row_show["make"] ?>">
                        <option value="<? echo $row_show["make"] ?>"><?=$row_show["make"] ?></option>
                        <option value="ดูหน้างาน">ดูหน้างาน</option>
                        <option value="ส่งหน้างานช่าง">ส่งหน้างานช่าง</option>
                        <option value="ส่งสินค้า">ส่งสินค้า</option>
                        <option value="วางบิลลูกค้า">วางบิลลูกค้า</option>
                        <option value="รับเช็ค">รับเช็ค</option>
                        <option value="อื่นๆ">อื่นๆ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">บุคคลเข้างาน</td>
                <td><input class="indexinput" type="text" name="textemployee" value="<?=$row_show["employee"]?>" />
                </td>
            </tr>
            <tr>
                <td align="right">วันที่เข้างาน</td>
                <? 
				$date1 = explode("-",$row_show["starttime"]);
				$starttime = $date1[2]."/".$date1[1]."/".$date1[0];
				?>
                <td><input class="indexinput" type="text" id="datepicker-th1" name="textdate" size="30" autocomplete="off" value="<?=$starttime; ?>"/></td>
                
            </tr>
               <tr>
                <td align="right">เวลาที่เข้างาน</td>
                <td>
                    <select class="indexinput"  name="texttime" value="<?=$row_show["time_in"] ?>">
                    	<option value="<? echo $row_show["time_in"] ?>"><?=$row_show["time_in"] ?></option>
                        <option value="00:00:00">00.00</option>
                        <option value="00:30:00">00.30</option>
                        <option value="01:00:00">01.00</option>
                        <option value="01:30:00">01.30</option>
                        <option value="02:00:00">02.00</option>
                        <option value="02:30:00">02.30</option>
                        <option value="03:00:00">03.00</option>
                        <option value="03:30:00">03.30</option>
                        <option value="04:00:00">04.00</option>
                        <option value="04:30:00">04.30</option>
                        <option value="05:00:00">05.00</option>
                        <option value="05:30:00">05.30</option>
                        <option value="06:00:00">06.00</option>
                        <option value="06:30:00">06.30</option>
                        <option value="07:00:00">07.00</option>
                        <option value="07:30:00">07.30</option>
                        <option value="08:00:00">08.00</option>
                        <option value="08:30:00">08.30</option>
                        <option value="09:00:00">09.00</option>
                        <option value="09:30:00">09.30</option>
                        <option value="10:00:00">10.00</option>
                        <option value="10:30:00">10.30</option>
                        <option value="11:00:00">11.00</option>
                        <option value="11:30:00">11.30</option>
                        <option value="12:00:00">12.00</option>
                        <option value="12:30:00">12.30</option>
                        <option value="13:00:00">13.00</option>
                        <option value="13:30:00">13.30</option>
                        <option value="14:00:00">14.00</option>
                        <option value="14:30:00">14.30</option>
                        <option value="15:00:00">15.00</option>
                        <option value="15:30:00">15.30</option>
                        <option value="16:00:00">16.00</option>
                        <option value="16:30:00">16.30</option>
                        <option value="17:00:00">17.00</option>
                        <option value="17:30:00">17.30</option>
                        <option value="18:00:00">18.00</option>
                        <option value="18:30:00">18.30</option>
                        <option value="19:00:00">19.00</option>
                        <option value="19:30:00">19.30</option>
                        <option value="20:00:00">20.00</option>
                        <option value="20:30:00">20.30</option>
                        <option value="21:00:00">21.00</option>
                        <option value="21:30:00">21.30</option>
                        <option value="22:00:00">22.00</option>
                        <option value="22:30:00">22.30</option>
                        <option value="23:00:00">23.00</option>
                        <option value="23:30:00">23.30</option>
                    </select>
                </td>
            </tr>
               <tr>
                <td align="right">หมายเลขรถ</td>
                <td witdh="50">
                    <select class="indexinput"  name="textcar">
                <?
                    $sql_car = "select carid,carname from car";
                    $result_car = mysql_query($sql_car) or die(mysql_error());
                ?> <option value="<?=$row_show["carid"]?>"><?=$row_show["carname"]?></option><?
                    while($row_car = mysql_fetch_array($result_car)){?>
                     <option value="<?=$row_car["0"];?>"><? echo $row_car["1"];?></option>
                <? } ?>
                </select>
                </td>
            </tr>
            <tr>
                <td align="right">รายละเอียดเข้างาน</td>
                <td>
                	<textarea class="indexinput" name="textsubject" cols="60" rows="4"><? echo $row_show['subject'];?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="center">
                    	<input type="hidden" name="textsubid" value="<?=$_GET["subid"];?>"/>
                        <input class="indexsubmit" type="submit" name="button" id="button" onClick="return confirm('ยืนยันการแก้ไข')" value="บันทึก"/>
                    </div>
                </td>
            </tr>
          </table>
  		</div>
    </form>
</body>
</html>