<?php include 'header.php';?>

<style type="text/css">
    html,
    body {
        height: 100%
    }

    #map-canvas {
        min-width: 200px;
        width: 100%;
        min-height: 200px;
        height: 100%;
    }
</style>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyBI99puIzUYT3b0-A8lirjyZypUTd5eI&signed_in=true"></script>
<script>
    var markers;
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
            scrollwheel: true, // Disable Mouse Scroll zooming (Essential for responsive sites!)
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

        //Restaurants
        addMarkerInfos(48.582641, 7.743370, "La Petite Pause Strasbourg Centre", "47 B Rue du Fossé des Tanneurs");
        addMarkerInfos(48.583932, 7.746764, "Kohler-Rehm", "13 Rue des Grandes Arcades");
        addMarkerInfos(48.581853, 7.749591, "Brasserie Au Dauphin", "13 Place de la Cathédrale");
        addMarkerInfos(48.581177, 7.746072, "La Chaîne d'Or", "134 Grand Rue");
    }



    function addMarker(one, two, message) { // the coordinates come from the C++ side
        var myLatlng = new google.maps.LatLng(one, two); // Add the coordinates
        var marker = new google.maps.Marker({ // Set the marker
            position: myLatlng, // Position marker to coordinates
            //icon:image, //use our image as the marker
            map: map, // assign the marker to our map variable
        });
        var infowindow = new google.maps.InfoWindow({ // Create a new InfoWindow
            content: message // HTML contents of the InfoWindow
        });
        google.maps.event.addListener(marker, 'click', function() { // Add a Click Listener to our marker
            infowindow.open(map, marker); // Open our InfoWindow
        });
    }



    function addMarkerInfos(one, two, message, infos) {
        var temp = "<h1>" + message + "</h1><br/>" + infos;
        addMarker(one, two, temp);
    }



    /*function addMarker(one, two, message)
    { // the coordinates come from the C++ side
      if (GBrowserIsCompatible())
      {
        var marker = new new google.maps.Marker(
        { // Set the marker
          position: new google.maps.LatLng(one,txo), // Position marker to coordinates
          //icon:image, //use our image as the marker
          map: map, // assign the marker to our map variable
          title: message // Marker ALT Text
      }
    }*/


    google.maps.event.addDomListener(window, 'load', initialise); // Execute our 'initialise' function once the page has loaded.
</script>

<section id="intro" class="wrapper style1 texte">
    <div class="inner">
        <header>
            <h2>Carte des services disponibles :</h2>
        </header>
        <div id="map-canvas"></div>
</section>

<?php include 'footer.php';?>
