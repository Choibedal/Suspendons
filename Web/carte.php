<?php
  $title="Carte des services";
  include 'header.php';

  include 'query.php';
  $partners = getPartners();

?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyBI99puIzUYT3b0-A8lirjyZypUTd5eI&signed_in=true"></script>
<script>
    //List of partners
    var part = <?php echo json_encode($partners, JSON_UNESCAPED_UNICODE);?>;
    //Keep track of las infowindows opened
    var prev_infowindow = false;
    //Array of all markers
    var markers = [];
    //Map used to show markers
    var map;

    function initialise() {
        var myLatlng = new google.maps.LatLng(48.5814263, 7.7458005); // Add the coordinates
        var mapOptions = {
            zoom: 15, // The initial zoom level when your map loads (0-20)
            minZoom: 6, // Minimum zoom level allowed (0-20)
            maxZoom: 20, // Maximum soom level allowed (0-20)
            zoomControl: true, // Set to true if using zoomControlOptions below, or false to remove all zoom controls.
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT // Change to SMALL to force just the + and - buttons.
            },
            center: myLatlng, // Centre the Map to our coordinates variable
            mapTypeId: google.maps.MapTypeId.ROADMAP, // Set the type of Map
            scrollwheel: false, // Disable Mouse Scroll zooming (Essential for responsive sites!)
            // All of the below are set to true by default, so simply remove if set to true:
            panControl: false, // Set to false to disable
            mapTypeControl: false, // Disable Map/Satellite switch
            scaleControl: false, // Set to false to hide scale
            streetViewControl: false, // Set to disable to hide street view
            overviewMapControl: false, // Set to false to remove overview control
            rotateControl: false // Set to false to disable rotate control
        }
        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions); // Render our map within the empty div

        //var image = new google.maps.MarkerImage("https://www.creare.co.uk/wp-content/uploads/2013/08/marker.png", null, null, null, new google.maps.Size(40,52)); // Create a variable for our marker image.

        /*var marker = new google.maps.Marker({ // Set the marker
          position: myLatlng, // Position marker to coordinates
          //icon:image, //use our image as the marker
          map: map, // assign the marker to our map variable
          title: 'Click to visit our company on Google Places' // Marker ALT Text
        });*/

        //  google.maps.event.addListener(marker, 'click', function() { // Add a Click Listener to our marker
        //    window.location='http://www.snowdonrailway.co.uk/shop_and_cafe.php'; // URL to Link Marker to (i.e Google Places Listing)
        //  });

        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(myLatlng);
        }); // Keeps the Pin Central when resizing the browser on responsive sites
        google.maps.event.addDomListener(window, 'resize', function() {
            google.maps.event.trigger(map, 'resize')
        }); // Keeps the Pin Central when resizing the browser on responsive sites


        geocoder = new google.maps.Geocoder();
        //Restaurants
        part.forEach(function(entry) {
            console.log(entry);
            var position = codeAddress(entry);
            console.log(position);
        });
    }

    function codeAddress(entry) {
        geocoder.geocode({
            'address': entry.address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                addMarker(results[0].geometry.location, entry);
            } else {
                alert('Error: ' + status);
            }
        });
    }

    function addMarker(location, entry) {
        var marker = new google.maps.Marker({
            map: map,
            position: location
        });
        var infowindow = new google.maps.InfoWindow({
            content: "<h3>" + entry.name + "</h3><p>" + entry.address + "</p>"
        });

        google.maps.event.addListener(marker, 'click', function() {
            if (prev_infowindow) {
                prev_infowindow.close();
            }

            prev_infowindow = infowindow;
            infowindow.open(map, marker);
        });

        markers.push(marker);
    }

    // The function to trigger the marker click, 'id' is the reference index to the 'markers' array.
    function openMarkerOnClick(id) {
        google.maps.event.trigger(markers[id], 'click');
    }


    google.maps.event.addDomListener(window, 'load', initialise); // Execute our 'initialise' function once the page has loaded.
</script>


<!-- Main-->
<div id="main" class="wrapper style3">
    <div class="container">
        <header class="major">
            <h2>Liste des services disponibles :</h2>
        </header>
        <div class="row 200%">
            <div class="4u 12u$(medium)">

                <!-- Sidebar -->
                <section id="sidebar">
                    <section>
                        <ul>
                            <?php
                      foreach ($partners as $key => $partner)
                      {
                          echo "<li class='unstyle'>";

                          echo '<a class="map-link" href="#" onclick="openMarkerOnClick('. $key .');">'. $partner["name"] .": </a>";
                          echo "</br>";
                          echo $partner["address"];

                          echo "</li>";
                      }
                  ?>
                        </ul>
                    </section>
                </section>

            </div>
            <div class="8u$ 12u$(medium) important(medium)">

                <!-- Content -->
                <section id="content">
                    <div id="map-canvas">
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'footer.php';?>
