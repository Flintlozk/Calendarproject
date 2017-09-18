<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/Stylesheet.css" />
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=th"></script>
  <script>
  var getpoint = new google.maps.LatLng(<?=$_GET["lat"]?>, <?=$_GET["lng"]?>);
  var marker;
  var map;
  function initialize() {
  var mapOptions = {
  zoom: 16,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
  center: getpoint
  };
   
  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
   
  marker = new google.maps.Marker({
  map:map,
  draggable:true,
  animation: google.maps.Animation.DROP,
  position: getpoint
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

  <style type="text/css" media="all">
  

  #map-canvas {display: block;margin: 10px auto;height: 90%;width: 100%;background-color:#FFF;}
  </style>
  
  <div style=" text-align:left;">
  <form name="map" method="post">
 <table border="0">
  <tr>
    <td><input type="hidden"class="inputbox" name="lat" id="lat" value="<?=$_GET["lat"]?>"/></td>
    <td><input type="hidden" class="inputbox" name="lng" id="lng" value="<?=$_GET["lng"]?>"/></td>
    <td><input type="button" name="button" class="btn btn-info" id="button" value="กลับ" onClick="window.history.back()"></td>
  </tr>
</table>
</form>
</div>
  <div id="map-canvas"></div>
 
 <script>
function xclose() {
		window.close();
}
</script>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'index2.php',
            data: $('form1').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });

        });

      });
    </script>