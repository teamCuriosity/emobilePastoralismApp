
<?php

    function locationNum($n){
    switch($n){
        case 0:
            $loc = "Jos";
            break;
        case 1:
            $loc = "Bokos";
            break;
        case 2:
            $loc = "Mangu";
            break;
        default:
            $loc = "No such location in this zone";
}
        return $loc;
}

    function creatLocationList(){
        if(ctype_digit($_GET["location"])){$x = $_GET["location"];}else{$x = 999;}
        $i = 0;
        while(1){
            if($i == "No such location in this zone"){
                break;
            }
            else{
                echo "<option value = \"$i\" ";
                if($i == $x){
                    echo 'SELECTED';
                }
                echo ">";
                echo locationNum($i);
                echo "</option>";
            }
            $i++;
        }
    }

?>
<html>
    <head>
        <title>NASA Project</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="jquery.js"></script>

		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
        
		<!--<script src="http://maps.google.com/maps/api/js?sensor=false">
        </script>-->

	
			<!--<script src="http://openlayers.org/api/OpenLayers.js"></script>
			<script src="http://openweathermap.org/js/OWM.OpenLayers.1.3.4.js"></script>-->
		

        <script>
		
			var markersData = [
				  {
                      phone:"09050000076",
					  lat: 9.9076454,
					  lng: 8.9582239,
					  place: "Hospital",
					  name: "Jos university teaching hospital, parmanent site",
					  address:"65 Lamingo Forest, Jos East, Plateau",
					  address2: "Praia da Barra",
					  postalCode: "3830-772 Gafanha da Nazaré" // don’t insert comma in the last item of each marker
				   },
					{
                        phone:"09050000098",
					  lat: 9.8865717,
					  lng: 8.9272026,
					  place: "Water",
					  name: "Lamingo dam",
					  address:"65 Lamingo Forest,Jos East,Plateau",
					  address2: "Praia da Barra",
					  postalCode: "3830-772 Gafanha da Nazaré" // don’t insert comma in the last item of each marker
				   },
				   {
                       phone:"09050000078",
					  lat: 9.896308,
					  lng: 8.969114,
					  place: "water",
					  name: "Lamingo River 1",
					  address:"",
					  address2: "Praia da Costa Nova",
					  postalCode: "3830-453 Gafanha da Encarnação" // don’t insert comma in the last item of each marker
				   }
				   ,
					{      phone:"09050111000",
						  lat: 9.914871,
						  lng: 8.951399,
						  place: "Water",
						  name: "Lamingo river 2",
						  address:"",
						  address2: "Gafanha da Nazaré",
						  postalCode: "3830-225 Gafanha da Nazaré" // don’t insert comma in the last item of each marker
					   }
					   ,
					   {
                           phone:"09050000000",
						  lat: 9.907708,
						  lng: 8.966647,
						  place: "Grass",
						  name: "Lamingo Graze Land",
						  address:"",
						  address2: "Gafanha da Nazaré",
						  postalCode: "3830-225 Gafanha da Nazaré" // don’t insert comma in the last item of each marker
					   }
					   ,
					   {
                           phone:"", 
						  lat: 9.863109,
						  lng: 8.873395,
						  place: "Water",
						  name: "",
						  address:"",
						  address2: "Gafanha da Nazaré",
						  postalCode: "3830-225 Gafanha da Nazaré" // don’t insert comma in the last item of each marker
					   },
					   {
                           phone: +2347031285559,
						  lat: 9.8788353,
						  lng: 8.871704,
						  place: "Current Location",
						  name: "nhub Nigerria",
						  address:"3rd floor, Taen business complex opp formal NITEL office, old airport Juction"
						  
					   },
						{
                            phone: +2347031610538,
						  lat: 9.877342,
						  lng: 8.875663,
						  place: "School",
						  name: "Rochas Foundation",
						  address:"Yakubu Gowon way, Jos, Nigeria."
						  
					   },
						{
                            phone: 08134556483,
						  lat: 9.8623868,
						  lng: 8.8671764,
						  place: "Police_station",
						  name: "Police Station",
						  address:"Yakubu Gowon Way Jos,Nigeria.",
						  address2: "Gafanha da Nazaré",
						  postalCode: "3830-225 Gafanha da Nazaré" // don’t insert comma in the last item of each marker
					   },
                		{
                        phone: +2347054466732,
						  lat: 9.8962271,
						  lng: 8.8818776,
						  place: "Hospital",
						  name: "Plateau Specialist Hospital",
						  address:"Off Bukuru Express Way Jos, Nigeria.",
						  postalCode: "3830-225 Gafanha da Nazaré" // don’t insert comma in the last item of each marker
					   },
                        {
                            phone: 08134556483,
						  lat: 9.86889,
						  lng: 8.8477513,
						  place: "Hospital",
						  name: "Unity Veterinary Clinic and Surgery, Jos, Plateau",
						  address:"Shop 4&5 Pipc Shopping Complex Low Cost Junction Miango Rd, Jos, Plateau, Jos",
						  address2: "Gafanha da Nazaré",
						  postalCode: "3830-225 Gafanha da Nazaré" // don’t insert comma in the last item of each marker
					   }
                        
                        
					   ];
		
            //var x = document.getElementById("side-info");
            if (navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(showCurrentLocation);
            }
            else
            {
               alert("Geolocation API not supported.");
            }

          // var newmap = new google.maps.latlng(52.395715,4.888916);
            var latitude = 9.8784561;
			 var longitude = 8.8739478;
            var coords;
			function showCurrentLocation(position)
            {
			
                var marker;
                //latitude = position.coords.latitude;
                //longitude = position.coords.longitude;
                coords = new google.maps.LatLng(latitude, longitude);
				
				//////////////////////////////////////
                document.getElementById("side-info").innerHTML ="Latitude: " + latitude +
                    "<br>Logitude: "+ longitude+"<br> "+ "Phone: "+ markersData[6].phone+ "<br> Name:"+markersData[6].name + "<br> Address: "+markersData[6].address;
				
				document.getElementById("title").innerHTML="<h3>Current Location Info</h3>";

                var mapOptions = {
                zoom: 15,
                center: coords,
                mapTypeControl: true,
                mapTypeId: google.maps.MapTypeId.TERRAIN 
            };

            //create the map, and place it in the HTML map div
           // map = new google.maps.Map(document.getElementById("mapPlaceholder"), mapOptions);
			//displayMarkers();
			map = new google.maps.Map(document.getElementById("mapPlaceholder"), mapOptions);
			$('#button').click(function(){//to get the vaue of selected
				var m_place=document.getElementById('category').value;
				
				 
                zoom: 15;
                map = new google.maps.Map(document.getElementById("mapPlaceholder"), mapOptions);
				//alert(marker_place);
				displayMarkers(m_place);
			});
			
            //place the initial marker
            var marker = new google.maps.Marker({
            position:coords,
            animation:google.maps.Animation.BOUNCE,
            map: map,
            title: "We are here",
			visible:true
            });
          }
		  
		  		function displayMarkers(marker_place){		
					   // this variable sets the map bounds according to markers position
					   var bounds = new google.maps.LatLngBounds();
					   
					   // for loop traverses markersData array calling createMarker function for each marker 
					   for (var i = 0; i < markersData.length; i++){
							//	alert(marker_place);
							if(markersData[i].place === marker_place && (markersData[i].lat < latitude + 0.09000000 || markersData[i].lng < longitude + 0.09000000)){
						
								//alert(markersData[i].place);
							  var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
							  var name = markersData[i].name;
							 var phone= markersData[i].phone;
							  var address = markersData[i].address;
							  var address2 = markersData[i].address2;
							  var postalCode = markersData[i].postalCode;

							  createMarker(phone, latlng, name, address, address2, postalCode);

							  // marker position is added to bounds variable
							  bounds.extend(latlng);
							}
                           else{
                               //alert(markersData[i].place+" is not found nearby.");
                           }
					   }

					   // Finally the bounds variable is used to set the map bounds
					   // with fitBounds() function
					   map.fitBounds(bounds);
		}
		function createMarker(phone, latlng, name, address, address2, postalCode){
				   var marker = new google.maps.Marker({
					  map: map,
					  position: latlng,
					  title: name+", "+latlng,
					  animation:google.maps.Animation.DROP
				   });
            var mymarker = new google.maps.Marker({
            position:coords,
            animation:google.maps.Animation.BOUNCE,
            map: map,
            title: "We are here"
            });

				   // This event expects a click on a marker
				   // When this event is fired the Info Window content is created
				   // and the Info Window is opened.
				   google.maps.event.addListener(marker, 'click', function() {
					  
					  // Creating the content to be inserted in the infowindow
					  var iwContent = '<div id="iw_container">' +
							'<div class="iw_title"> Name: ' + name + '</div>' +
						 '<div class="iw_content"> Address: ' + address + '</div>'+
						 '<div> Phone: '+phone+'</div></div>';
                       
					   //////////////////////////////////////
                       document.getElementById("side-info").innerHTML = iwContent;//"Phone: " + phone + "<br> Address: "+address;
						document.getElementById("title").innerHTML="<h3>Destination Info</h3>";
					  
					  GetRoute(latlng);
					  
					  
					  // including content to the Info Window.
					  //infoWindow.setContent(iwContent);

					  // opening the Info Window in the current map and at the current marker location.
					 // infoWindow.open(map, marker);
				   });
		}
            
			var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('txtSource'));
            new google.maps.places.SearchBox(document.getElementById('txtDestination'));
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });

        function GetRoute(latlng) {
            /*var mumbai = new google.maps.LatLng(18.9750, 72.8258);
            var mapOptions = {
                zoom: 7,
                center: mumbai
            };
			*/
            //map = new google.maps.Map(document.getElementById('mapPlaceholder'), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('route'));

            //*********DIRECTIONS AND ROUTE**********************//
            //source = document.getElementById("txtSource").value;
            //destination = document.getElementById("txtDestination").value;

			//source = new google.maps.Map(document.getElementById('side-info'),mapOptions);
			
			source = new google.maps.LatLng(latitude, longitude);
			destination = latlng;
			
            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.WALKING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    var dvDistance = document.getElementById("dvDistance");
                    dvDistance.innerHTML = "";
                    dvDistance.innerHTML += "Distance: " + distance + "<br />";
                    dvDistance.innerHTML += "Duration:" + duration;

                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }

			
        </script>
      <style>
		
		
	  </style>  
    </head>
    
    <body>
        
        <div id="wrapper">
            <header id="header"><img src="logo.png" width="60" height="50" /><p>NASA emobile Pastorialism</p></header>
			<div id="mapinfowrapper">
				
				
				
				<div id="mapPlaceholder" ></div>
				
				<div id="info-session"><hr>
                    <div class="title" id="title"></div>

						<aside id="side-info"></aside>

				</div>
				
				<div class ="clear"></div>
				
				
				
			</div>	
			
            <div id="form-session">
                <div id="search">
                
                    <form method="post" action="">
                        <input type="text" name="keywords" id="keywords" size="100" class="search-box"> 
                        <select id="category" name="category" class="search-box">
                            <option>Select a location</option>
                            <option value="Grass">Graze land</option>
                            <option value="Water">Water</option>
                            <option value="Hospital">Hospital</option>
							<option value="Police_station">Police station</option>
							<option value="School">School</option>
                        </select>
                        <input type="button" value="Find" name="find" id="button" />
                    </form>
                    
                </div>
            </div>
			
			<div id="route"></div>
            
			
            <!--<div id="img-holdr">
               
                <p id="img-text"><b>NASA emobile Pastorialism</b><br>Find you current geolocation and <br> general information about your current surounding </p>
                
            </div>-->
            </div>
                
        
       
    </body>
</html>
