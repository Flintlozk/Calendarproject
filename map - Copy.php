<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/Stylesheet.css" />
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=th"></script>
  <script>
  var bangkok = new google.maps.LatLng(13.730995466424108, 100.51986257812496);
  var marker;
  var map;
  function initialize() {
  var mapOptions = {
  zoom: 10,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
  center: bangkok
  };
   
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

  <style type="text/css" media="all">
  

  #map-canvas {display: block;margin: 10px auto;height: 500px;width: 100%;background-color:#FFF;}
  </style>
<div class="contrainer">
  <div style=" text-align:left;">
  <form name="map" method="post">
 <table border="0">
  <tr>
    <td><strong>Latitude</strong></td>
    <td><input type="text"class="inputbox" name="lat" id="lat" /></td>
    <td><strong>Longitude</strong></td>
    <td><input type="text" class="inputbox" name="lng" id="lng" /></td>
    <td><input type="submit" name="button" class="indexsubmit3" id="button" value="นำไปใช้" onClick="makes()"></td>
    <td><input type="button" name="button" class="indexsubmit3" id="button" value="ปิด" onClick="xclose()"></td>
  </tr>
</table>
</form>

</div>
  <div id="map-canvas"></div>
</div>  
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