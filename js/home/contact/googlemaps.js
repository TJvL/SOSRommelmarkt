var geocoder;
var map;
function initialize() {
          geocoder = new google.maps.Geocoder();
          var latlng = new google.maps.LatLng(34.052234,-118.243685);
          var address = document.getElementById('adres').innerText + ' ' + document.getElementById('plaats').innerText; 

// var address = '<?php echo $companyInformation->address.', '.$companyInformation->city; ?>';

var myOptions = {
              zoom: 15,
              center: latlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
                  }

map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
geocoder.geocode( { 'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                      map.setCenter(results[0].geometry.location);
                      var marker = new google.maps.Marker({
                        map: map, 
                        position: results[0].geometry.location
                      });
                    } else {
                      alert("Geocode was not successful for the following reason: " + status);
                }
          });
     }