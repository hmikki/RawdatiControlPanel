//AIzaSyACa0meLptdLQtMUZSFST8awFKIMiBbhGg
var map ;
var myLatlng;
$(document).ready(function(){



     
      geoLocationInit()

	  function geoLocationInit(){
	  	if (navigator.geolocation) {
	  		navigator.geolocation.getCurrentPosition(success, fail);
	  	}else{
	  		alert('Browser not supported');
	  	};
	  }

	  function success(position){
         var latval = position.coords.latitude ; 
         var lngval = position.coords.longitude ; 

         myLatlng = new google.maps.LatLng(latval, lngval);
         createMap(myLatlng);
         nearBySearch(myLatlng,"school");

	  }
	  function fail(){
	  	alert('its fails');
	  }
	  var myLatlng = new google.maps.LatLng(-33.6, 151.2);

	  

	  function createMap(myLatlng){
		    map = new google.maps.Map(document.getElementById("map"), {
		    center: myLatlng,
		    zoom: 8,
		  });

		  var marker=new google.maps.Marker({
             position: myLatlng,
		     map:map
		  });
	  }

      createMarker(myLatlng,'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png','gaza');
      function createMarker(latlng , icn , name){
	  var marker = new google.maps.Marker({
		    position: latlng,
		    map:map,
		    icon:icn,
		    title:name
		});

		}
		function nearBySearch(myLatlng, type){
			var request = {
			    location: myLatlng,
			    radius: '1500',
			    type: [type]
			  };
	  service = new google.maps.places.PlacesService(map);
      service.nearbySearch(request, callback);

      function callback(results, status) {

		  if (status == google.maps.places.PlacesServiceStatus.OK) {
		    for (var i = 0; i < results.length; i++) {
		    	latlng = place.geometry.location;
		    	icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png' ;
		        name = place.name ;

		        createMarker(latlng, icn , name );
		    }
		  }
		 }

		 
		}
      


});