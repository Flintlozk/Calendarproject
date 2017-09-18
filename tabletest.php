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
<title>sgd service</title>

</head>

<?php require_once('foot.php'); ?>
<?php require_once('main.php'); ?>
<?php require_once('menu.php'); ?>
<table width="1000" border="0" align="center">
  	<tr><th height="10" scope="col"><div align="right"></div></th>
  		</tr>
    <tr><th height="111" scope="col"></th>
   		</tr>
  	<tr><td></td>
    	</tr>
  <tr><td>
    <table width="1000" cellpadding="0" cellspacing="0" border="0" width="100%">
  <tr>
    <td bgcolor="#313A3A" align="center"><font size="6" color="#FFFFFF">&nbsp;Calendar Service</font></td>
  </tr>
  <tr>
    <td bgcolor="#727272" align="center" ><a href="insertjob.php" class="btn btn-default" role="button" ><strong>สร้างงาน</strong></a></button>&nbsp;</a></td>
    
  </tr>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
       
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/blitzer/jquery-ui.css" />    
<link rel="stylesheet" href="//ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables_themeroller.css" />
 <body >       
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
    <thead>

        <tr>
            <th width="4%">ลำดับ</th>
            <th width="15%">Job Number</th>
          <th width="28%">อาการที่แจ้ง</th>
          <th width="36%">แก้ปัญหา</th>
            <th width="17%">เวลา</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?
 		$strMID="select * from admin where 1=1 and user='".$_SESSION["textuser"]."' ";
		$queryM = mysql_query($strMID);
		$Member= mysql_fetch_array($queryM);
		$user =$Member["userid"];					
							
		$sql_show = "select * from service where staID=0 and userid='$user' ";
		$result_show = mysql_query($sql_show) or die(mysql_error());
		while($row_show = mysql_fetch_array($result_show))
		
		{
		
								if($bg == "#D6D6D6") 
								{ //ส่วนของการ สลับสี 
									$bg = "#FFFFFF";
									} else 
									{$bg = "#D6D6D6";
								}
								$i++;
			
?>
            <td><?=$i;?></td>
            <td><a href="jobviwe.php?Serail=<?=$row_show["Serail"]?>"><?=$row_show["Serail"]?></a></td>
            <td><?=$row_show["Namecus"]?>/<?=$row_show["Navser"]?></td>
            <td class="center"><?=$row_show["Datejob"]?></td>
            <td class="center"><?=$row_show["Date"];?></td>
            
        </tr>
         <?
}
?>
    </tbody>
    <tfoot>
        <tr>
            <th>ลำดับ</th>
            <th>Job Number</th>
            <th>อาการที่แจ้ง</th>
            <th>แก้ปัญหา</th>
            <th>เวลา</th>
        </tr>
    </tfoot>
</table>


<script type="text/javascript">
$(document).ready(function(){
//    $('#example').dataTable();
    oTable = $('#example').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers"
    }); 
});
</script>




</body>
</html>
