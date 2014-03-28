var latlng;
var map1;

function createGoogleMap(containerId, latitud, longitud)
{
  console.log('aca');
  // Creating a LatLng object containing the coordinate for the center of the map
  latlng = new google.maps.LatLng(latitud, longitud);
  // Creating an object literal containing the properties we want to pass to the map
  var options = {
    zoom: 15,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    backgroundColor: '#ffffff',
    scrollwheel: false
  }; 
  // Calling the constructor, thereby initializing the map
  map1 = new google.maps.Map(document.getElementById(containerId), options);
  //console.info(map1);
  return false;
}