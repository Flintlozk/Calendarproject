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
	<title> </title>
   		 <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link type="text/css" rel="stylesheet" href="css/Stylesheet.css" />
    
		<link type="text/css" rel="stylesheet" href="css/base/jquery-ui-1.9.2.custom.css" />
		<link type="text/css" rel="stylesheet" href="css/base/jquery-ui-1.9.2.custom.min.css" />
        
        <link rel="stylesheet" href="css/dataTables/dataTables.css" />
		<link rel="stylesheet" href="css/dataTables/dataTables_themeroller.css" />
        <link rel="stylesheet" href="plugins/select2/select2.min.css">
 		       
		<script src="js/1.8.3/jquery.min.js"></script> 
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/1.9.4/jquery.dataTables.min.js"></script>
        
        <script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
        <script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay1 = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);
			var toDay2 = (d.getFullYear() + 543) + '/' + (d.getMonth() + 1) + '/' + d.getDate();
			var toDay3 = (d.getFullYear() + 543) + '/' + (d.getMonth() + 1) + '/' + d.getDate();

		    $("#datepicker-th1").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay1, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			
			$("#datepicker-th2").datepicker({ dateFormat: 'yy/mm/dd', isBuddhist: true, defaultDate: toDay2, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			  
			$("#datepicker-th3").datepicker({ dateFormat: 'yy/mm/dd', isBuddhist: true, defaultDate: toDay3,  inline: true});
		    $("#inline").datepicker({ dateFormat: 'dd/mm/yy',inline: true });
			});
		</script>      
        <script>
			$(function() {
  		 	$("#datepicker-th3").change(function() {
     			$("#getDay").submit();
   			});
 		});
		</script>

</head>
 
<body>
<? date_default_timezone_set("Asia/Bangkok"); ?>

<!-------------------------------------------------------------- Status -----------------------------------------------------------------> 

<div class="contrainer">
<!--------------------------------- Main Menu ----------------------------------------------->
	<?php include 'mainmenu.php';?>
<!--------------------------------- Main Menu ----------------------------------------------->

   <form id="form1" name="form1" method="post" action="checkinsertjob2.php">
<div id="mapform" class="collapse">
 	<div align="center">
    	<input type="text" name="textlat" id="lat" placeholder="Latitute"/>
		<input type="text" name="textlng" id="lng" placeholder="Longitute"/>
    </div>
    <div id="map-canvas"></div>
    <div align="center">
   		<button id="togglemap" name="test" type="button" class="btn btn-success" onclick="gmaps()">Google Map</button>
    	<button id="togglemap" name="test" type="button" class="btn btn-danger" data-toggle="collapse" data-target="#mapform,#cale">ปิด</button>
    </div>
  <br>
 </div>
<div id="inputform">
<table border='0'>
	<tr>
	<td width="5%"></td>
    	<td width="50%">
<!-------------------------------------------------------------- Insert form -----------------------------------------------------------------> 
    <table class="tableindex" name='table1' border='0' align='left'>
    <tr>
		<td colspan="2">
		<div align="center">
        	<p><b>Calendar Project</b></p>
        </div>
        </td>
    </tr>
    <tr>
    	<td align='right'>สถานที่</td>
    	<td>
        	<input class="inputbox2" type="text" name="textlocation" required/>
            <button id="togglemap" name="test" type="button" class="btn btn-info btn-xs" data-toggle="collapse" data-target="#mapform,#cale">แผนที่</button>
        </td>
    </tr>
    <tr>
    	<td align='right'>ชื่อลูกค้า</td>
    	<td><input class="inputbox" type="text" name="textnamecus" required/></td>
    </tr>
     <tr>
    	<td align='right'>วัตถุประสงค์</td>
    	<td>
        	<select  class="inputbox" name="textmake" value="" required>
            	<option value="">--เลือก--</option>
        		<option value="ดูหน้างาน">ดูหน้างาน</option>
                <option value="ส่งหน้างานช่าง">ส่งหน้างานช่าง</option>
                <option value="ส่งมอบงาน">ส่งมอบงาน</option>
                <option value="Demo">Demo</option>
           		<option value="ส่งสินค้า">ส่งสินค้า</option>
                <option value="วางบิลลูกค้า">วางบิลลูกค้า</option>
                <option value="รับเช็ค">รับเช็ค</option>
                <option value="อื่นๆ">อื่นๆ</option>
            </select>
		</td>
    </tr>
    <tr>
    	<td align='right'>บุคคลเข้างาน</td>
    	<td><input class="inputbox" type="text" name="textemployee" value="<? echo $_SESSION["textuser"]?>" />
        <input type="hidden" name="userid" value="<? echo $_SESSION["userid"]?>"/>
        </td>
    </tr>
    <tr>
    	<td align='right'>วันที่เข้างาน</td>
    	<td><input class="inputbox"  type="text" id="datepicker-th1" name="textdate" size="30" autocomplete="off" required/></td>
        
    </tr>
       <tr>
    	<td align='right'>เวลาที่เข้างาน</td>
    	<td>
        	<select class="inputbox"  name="texttime" value="" required>
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
    	<td align='right'>หมายเลขรถ</td>
        <td>
            <select  class="inputbox" name="textcar">
    	<?
			$sql_show = "select carname from car ";
			$result_show = mysql_query($sql_show) or die(mysql_error());
		?> <option value=""> </option><?
			while($row_show = mysql_fetch_array($result_show)){?>
			 <option value="<? echo $row_show["0"];?>">
			 	<? echo $row_show["0"];?>
             </option>
        <? } ?>
    	</select>
        </td>
    </tr>
    <tr>
      	<td>รายละเอียดเข้างาน</td>
      	<td><textarea class="inputbox" name="textsubject" cols="60" rows="3" required></textarea></td>
    </tr>
    <tr>
        <td colspan="2">
         	<div align="center">
         		<input class="indexsubmit4" type="submit" name="button" id="button" value="บันทึก"/>
          	</div>
        </td>
    </tr>
  </table>
  </td>
	<td align="center" width="50%" >
</form>
<!----------------------------------------------------------- Thai Time Format -------------------------------------------------------------> 
<? function DateThai($strDate) //แปลง Date/Time = Thai Date/Time
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("m",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
						
			return "$strYear/$strMonth/$strDay";
	}
	$strDate = date("Y-m-d"); //เวลาปัจจุบัน อิงจากเวลา Server
?>

 	
<!-------------------------------------------------------------- Calendar -----------------------------------------------------------------> 

    <form name="getDay" id="getDay" method="get" action="index.php">
	        <div id="datepicker-th3"></div>
            <label>
				<font color='red' size='2'>&nbsp;*เลือกแสดงวันที่นัดหมาย*</font><br/>
            </label>
            <input type="hidden" name="thisday" id="datepicker-th3_value" value=""/>  
            
      </form>

<!-------------------------------------------------------------- Sort Day -----------------------------------------------------------------> 
    	<form name="show_all" method="get" action="index.php">
	  
			<input type="hidden" name="show_allvalue" value="1" />
        	<input type="submit" name="button" class="indexsubmit3" id="button2" value="แสดงงานทั้งหมด" /> 
        
      </form>
	</td>
</tr>
</table>


<!-------------------------------------------------------------- Data Table -----------------------------------------------------------------> 
</div> 
           <? 
	  	$sx = explode("/",DateThai($strDate)); // dd/mm/yy	
		$ex = explode("/",$_GET["thisday"]); // dd/mm/yy	
		?>
 
  <div align="center">
    	<b><font size="2" color="red">
		<? if($_GET["thisday"] == ""){
			switch($sx[1]){
				case 1: echo "วันที่ ".$sx[2]."  มกราคม พ.ศ. ".$sx[0]; break;
				case 2: echo "วันที่ ".$sx[2]."  กุมภาพันธ์ พ.ศ. ".$sx[0]; break;
				case 3: echo "วันที่ ".$sx[2]."  มีนาคม พ.ศ. ".$sx[0]; break;
				case 4: echo "วันที่ ".$sx[2]."  เมษายน พ.ศ. ".$sx[0]; break;
				case 5: echo "วันที่ ".$sx[2]."  พฤษภาคม  พ.ศ. ".$sx[0]; break;
				case 6: echo "วันที่ ".$sx[2]."  มิถุนายน พ.ศ. ".$sx[0]; break;
				
				case 7: echo "วันที่ ".$sx[2]."  กรกฎาคม พ.ศ. ".$sx[0]; break;
				
				case 8: echo "วันที่ ".$sx[2]."  สิงหาคม พ.ศ. ".$sx[0]; break;
				case 9: echo "วันที่ ".$sx[2]."  กันยายน พ.ศ. ".$sx[0]; break;
				case 10: echo "วันที่ ".$sx[2]."  ตุลาคม พ.ศ. ".$sx[0]; break;
				case 11: echo "วันที่ ".$sx[2]."  พฤศจิกายน  พ.ศ. ".$sx[0]; break;
				case 12: echo "วันที่ ".$sx[2]."  ธันวาคม พ.ศ. ".$sx[0]; break;
				}
			}else{
			switch($ex[1]){
				case 1: echo "วันที่ ".$ex[2]."  มกราคม พ.ศ. ".$ex[0]; break;
				case 2: echo "วันที่ ".$ex[2]."  กุมภาพันธ์ พ.ศ. ".$ex[0]; break;
				case 3: echo "วันที่ ".$ex[2]."  มีนาคม พ.ศ. ".$ex[0]; break;
				case 4: echo "วันที่ ".$ex[2]."  เมษายน พ.ศ. ".$ex[0]; break;
				case 5: echo "วันที่ ".$ex[2]."  พฤษภาคม  พ.ศ. ".$ex[0]; break;
				case 6: echo "วันที่ ".$ex[2]."  มิถุนายน พ.ศ. ".$ex[0]; break;
				case 7: echo "วันที่ ".$ex[2]."  กรกฎาคม พ.ศ. ".$ex[0]; break;
				case 8: echo "วันที่ ".$ex[2]."  สิงหาคม พ.ศ. ".$ex[0]; break;
				case 9: echo "วันที่ ".$ex[2]."  กันยายน พ.ศ. ".$ex[0]; break;
				case 10: echo "วันที่ ".$ex[2]."  ตุลาคม พ.ศ. ".$ex[0]; break;
				case 11: echo "วันที่ ".$ex[2]."  พฤศจิกายน พ.ศ. ".$ex[0]; break;
				case 12: echo "วันที่ ".$ex[2]."  ธันวาคม พ.ศ. ".$ex[0]; break;
				}
			}
	   ?>
       </font></b>
       </div>
    </div>

<? echo $_POST["lat"],$_POST["lng"];?>

<table width="99%" id="example">
    <thead>
      <tr>
		<th width="4%"><font size="3">User</font></th>
		<th width="8%"><font size="3">วันเวลานัดหมาย</font></th>
		<th width="6%"><font size="3">บุคคลเข้างาน</font></th>
        <th width="15%"><font size="3">รายละเอียดลูกค้า</font></th>
        <th width="15%"><font size="3">รายละเอียดเข้างาน</font></th>
        <th width="6%"><font size="3">ทะเบียนรถ</font></th>
		<th width="6%"><font size="3">วันที่ลงงาน</font></th>
		<th width="2%" ></th>
        <th width="2%" ></th>
      </tr>
    </thead>
    <tbody>
	<? $_SESSION["sendDay"] = $_GET["thisday"];?>
        <?			
			if($_GET["show_allvalue"] == "1"){
				$sql_show = "select DATE_FORMAT(endtime,'%d-%m-%Y %H:%i:%s') ,location,employee,starttime,subject,subid,admin.userid,color,car.carid,carname,user,time_in,namecus,make,username,coor_Latitute,coor_Longitute from subject,admin,car where subject.userid=admin.userid and subject.carid = car.carid";
			} else if(empty($_GET["thisday"])){
				$sql_show = "select DATE_FORMAT(endtime,'%d-%m-%Y %H:%i:%s') ,location,employee,starttime,subject,subid,admin.userid,color,car.carid,carname,user,time_in,namecus,make,username,coor_Latitute,coor_Longitute from subject,admin,car where subject.userid=admin.userid and subject.carid = car.carid and starttime='".DateThai($strDate)."' ";
			} else if($_GET["thisday"]){
				$sql_show = "select DATE_FORMAT(endtime,'%d-%m-%Y %H:%i:%s') ,location,employee,starttime,subject,subid,admin.userid,color,car.carid,carname,user,time_in,namecus,make,username,coor_Latitute,coor_Longitute from subject,admin,car where subject.userid=admin.userid and subject.carid = car.carid and starttime='".$_GET["thisday"]."' ";
			} 

			$result_show = mysql_query($sql_show) or die(mysql_error());
			while($row_show = mysql_fetch_array($result_show)){
		?>	
		<? $date = explode("-",$row_show["3"]); // dd/mm/yy
            $startdate = $date[2]."-".$date[1]."-".$date[0];
                    
            $time = explode(":",$row_show["11"]); // H:i
            $time_in = $time[0].":".$time[1];	
            
            $timestamp = $row_show["0"];
            $splitTimeStamp = explode(" ",$timestamp);
            $rowtime1 = $splitTimeStamp[0];
            $rowtime2 = $splitTimeStamp[1];
            
            $carlicense = $row_show["9"];
            $splitcarlicense = explode(" ",$carlicense);
            $carli_1 = $splitcarlicense[0];
            $carli_2 = $splitcarlicense[1];
        ?>
        
        
           
		<tr bgcolor="<? echo $row_show["7"]?> ">  
                
            <td><font size="2"><div align="center"><?=$row_show["14"];//user?></div></font></td>
            <td><font size="2"><div align="center"><?=$startdate;//วันที่เข้างาน?>&nbsp;<?=$time_in;//เวลาเข้างาน?>&nbsp;น.</div></font></td> 
            <td><font size="2"><?=$row_show["2"];//บุคคลเข้างาน?></font></td>
            <td><font size="2"><?=$row_show["12"];//ชื่อลูกค้า?>&nbsp;<?=$row_show["1"];//สถานที่?></font>
            	<? if($row_show["15"]==NULL&&$row_show["16"]==NULL){}else{?>
                <a href="./map.php?lat=<?=$row_show["15"]?>&lng=<?=$row_show["16"]?>">
                    <span>
                        <img width="20px" height="20px" class="manImg" src="./image/map.png"></img>
                    </span>
                </a>
                <? }?>
            </td>  
            <td><font size="2"><?=$row_show["13"];//วัตถุประสงค์เข้างาน?>&nbsp;<?=$row_show["4"];//รายละเอียดเข้างาน?></font></td>	
            <td><font size="2"><div align="center"><?=$carli_1?><?=$carli_2//ทะเบียนรถ(carname)?></div></font></td>
            <td><font size="2"><div align="center"><?=$rowtime1//วันที่ลงงาน?></div></font></td><? //=$rowtime2//เวลาลงงาน?>
            <td><font size="2"><div align="center"> 
                	<? if($_SESSION["status"] == "admin"){?>
                    	<a href="editjob.php?subid=<?=$row_show["5"]?>">
                    		<img src="./image/edit.png" width="20px" hieght="20px"align="center">
                   		</a>
 					<? }else if($_SESSION["status"] == "user" && $_SESSION["userid"] == $row_show["6"]){?> 
                      	<a href="editjob.php?subid=<?=$row_show["5"]?>">
                   			<img src="./image/edit.png" width="20px" hieght="20px"align="center">
                     	</a>
					<? } ?>
				</div>
			</td>
             <td>
             	<div align="center"> 
                	<? if($_SESSION["status"] == "admin"){?>
                    	<a onClick="return confirm('ต้องการลบงานหรือไม่')" href="deletejob.php?subid=<?=$row_show["5"]?>">

                    		<img src="./image/delete.png" width="20px" hieght="20px"align="center">
                   		</a>
 					<? }else if($_SESSION["status"] == "user" && $_SESSION["userid"] == $row_show["6"]){?> 
                      	<a onClick="return confirm('ต้องการลบงานหรือไม่')" href="deletejob.php?subid=<?=$row_show["5"]?>">
                   			<img src="./image/delete.png" width="20px" hieght="20px"align="center">
                     	</a>
					<? } ?>
				</div>
        	</td>
    	</tr>
	<? } ?>
    </tbody>
    <tfoot>
        <tr>
        	
            <th><font size="3">User</font></th>
            <th><font size="3">วันเวลานัดหมาย</font></th>
            <th><font size="3">บุคคลเข้างาน</font></th>
            <th><font size="3">รายละเอียดลูกค้า</font></th>
            <th><font size="3">รายละเอียดเข้างาน</font></th>
            <th><font size="3">ทะเบียนรถ</font></th>
            <th><font size="3">วันที่ลงงาน</font></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=th"></script>
  <script>
  var bangkok = new google.maps.LatLng(13.730995466424108, 100.51986257812496);
  var marker;
  var map;
 
  function initialize() {
  var mapOptions = {  zoom: 14,  mapTypeId: google.maps.MapTypeId.ROADMAP,  center: bangkok  };

   
  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
   
  marker = new google.maps.Marker({
  map:map,
  draggable:true,
  animation: google.maps.Animation.DROP,
  position: bangkok
  });
 google.maps.event.addListener(marker, 'click', toggleBounce);
  google.maps.event.addListener (marker, 'drag', function (event) {
  document.getElementById("lat").value = marker.getPosition().lat();
  document.getElementById("lng").value = marker.getPosition().lng();
  });
   
  google.maps.event.addListener (marker, 'dragend', function (event) {
  var point = marker.getPoint();
  map.panTo(point);
  });
  }
   
  function toggleBounce() {
  if (marker.getAnimation() != null){
  marker.setAnimation(null);
  }else{
  marker.setAnimation(google.maps.Animation.BOUNCE);
  }
  }
  google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  <script>
	function makes()
	{
	document.getElementById("latitude").value = document.getElementById("lat").value;	
	document.getElementById("longitude").value = document.getElementById("lng").value;
	}
  </script>
  <script>
      $('#mapform').on('shown.bs.collapse', function(e) {
		  initialize();
            google.maps.event.trigger(map, 'resize');
			

        });
  </script>

  <style type="text/css" media="all">
    #map-canvas {display: block;margin: 10px auto;height: 750px;width: auto;background-color:#FFF;}
  </style>

<!-------------------------------------------------------------- misc ------------------------------------------------------------------------->

<!----------------------------------------------------- Call Datatable Script ----------------------------------------------------------------->
<script type="text/javascript">
$(document).ready(function(){
//    $('#example').dataTable();
    oTable = $('#example').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers"
    }); 
});
</script>

<!--------------------------------------------------------Sort Table by fnSort----------------------------------------------------------------->
<script>
$(document).ready(function() {
     var oTable = $('#example').dataTable();
     // Sort immediately with columns 0 and 1
     oTable.fnSort( [ [0,'asc'],[1,'asc'] ] );
   } );
</script>

<!-------------------------------------------------Inline Carlendar Selected----------------------------------------------------------------->
<script>     
$('#datepicker-th3').datepicker({
	dateFormat: 'yy/mm/dd',
	dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
    dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
    monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
    monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'],
    inline: true,
	isBuddhist: true,
    altField: '#datepicker-th3_value'
});
</script>

<!-------------------------------------------------Pass Parameter----------------------------------------------------------------->
<script>
$('#datepicker-th3_value').change(function(){
    $('#datepicker-th3').datepicker('setDate', $(this).val());
});
</script>

<script type="text/javascript">
function hideshow() {
    var x = document.getElementById('inputform');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>


<script type="text/javascript">
function gmaps() {
		window.open("http://map.google.com");
}
</script>



</body>
</html>
