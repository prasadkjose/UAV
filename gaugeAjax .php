<!DOCTYPE html>
<html lang="en">

<head>
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    
    body {
  padding: 20px;
  background-color:#ffffc9
}

p { margin : 0; }

    </style>
    
    </head>


<p><button onclick="geoFindMe()">Show my location</button></p>
<div id="out"></div>
    
    
    <script>
        
        function geoFindMe() {
  var output = document.getElementById("out");

  if (!navigator.geolocation){
    output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
    return;
  }

  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;

    output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';

    var img = new Image();
    img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

    output.appendChild(img);
  }

  function error() {
    output.innerHTML = "Unable to retrieve your location";
  }

  output.innerHTML = "<p>Locating…</p>";

  navigator.geolocation.getCurrentPosition(success, error);
}

    
    </script>
    
    
    
</html>