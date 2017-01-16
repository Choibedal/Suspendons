<!DOCTYPE HTML>
<!--
    Reflex by Pixelarity
    pixelarity.com | hello@pixelarity.com
    License: pixelarity.com/license
-->
<html>

<head>
    <title>Suspen'Dons | Carte des services</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="shortcut icon" type="image/x-icon" href="images/SD favicon.png">
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>

<body>

    <!-- Header -->
    <header id="header">
        <nav>
            <ul>
                <li><a href="#menu">Menu</a></li>
            </ul>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <h2>Menu</h2>
        <ul class="links">
            <li><a  href="index.php">Accueil</a></li>
            <li><a  href="concept.php">Concept</a></li>
            <li><a  href="team.php">L'équipe</a></li>
            <li><a  href="services.php">Liste des services</a></li>
            <li><a class="active" href="carte.php">Carte des services</a></li>
            <!--<li><a href="temoins.php">Témoignages</a></li>-->
        </ul>
        <ul class="actions vertical">
            <li><a  href="don.php" class="button fit special">Je fais un don</a></li>
        </ul>
    </nav>

    <!-- Wrapper -->
    <div id="wrapper">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "suspendons";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql = "SELECT * FROM utilisateur WHERE utilisateur.idType = (SELECT id FROM typeuser WHERE typeuser.Nom = 'Partenaire')";
            $partners = array();
            //Si tu vire cette ligne ça marche plus, have fun (en gros mysql n'est pas en utf8 et avec ça ça marche)
            $conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {

                // output data of each row
                while($row = $result->fetch_assoc()) 
                {
                    array_push($partners, [
                        'name' => $row["PSEUDO"],
                        'address' => implode(' ', [$row["ADRESSE"], $row["CP"], $row["VILLE"]])
                    ]);
                }
            }
            $conn->close();
        ?>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyBI99puIzUYT3b0-A8lirjyZypUTd5eI&signed_in=true"></script>
    <script>
        //List of partners
        var part = <?php echo json_encode($partners, JSON_UNESCAPED_UNICODE);?>;
        //Keep track of las infowindows opened
        var prev_infowindow =false;
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


            geocoder = new google.maps.Geocoder();
            //Restaurants
            part.forEach(function(entry) {
                console.log(entry);
                var position = codeAddress(entry);
                console.log(position);
            });



            //addMarkerInfos(48.582641, 7.743370, "La Petite Pause Strasbourg Centre", "47 B Rue du Fossé des Tanneurs");
            //addMarkerInfos(48.583932, 7.746764, "Kohler-Rehm", "13 Rue des Grandes Arcades");
            //addMarkerInfos(48.581853, 7.749591, "Brasserie Au Dauphin", "13 Place de la Cathédrale");
            //addMarkerInfos(48.581177, 7.746072, "La Chaîne d'Or", "134 Grand Rue");
        }



        function codeAddress(entry) {
            geocoder.geocode( { 'address': entry.address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    addMarker(results[0].geometry.location, entry);
                } else {
                    alert('Pute: ' + status);
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

            google.maps.event.addListener(marker, 'click', function()
            {
                if( prev_infowindow ) 
                {
                   prev_infowindow.close();
                }

                prev_infowindow = infowindow;
                infowindow.open(map, marker);
            });

            markers.push(marker);
        }

        // The function to trigger the marker click, 'id' is the reference index to the 'markers' array.
        function openMarkerOnClick(id){
            google.maps.event.trigger(markers[id], 'click');
        }


        google.maps.event.addDomListener(window, 'load', initialise); // Execute our 'initialise' function once the page has loaded.
    </script>
    <div id="container">
        <div class="poi_menu">
            <ul>
                <?php 
                    foreach ($partners as $key => $partner) 
                    {
                        echo "<li>";

                        echo '<a href="#" onclick="openMarkerOnClick('. $key .');">'. $partner["name"] ."</a>";
                        echo "</br>";
                        echo $partner["address"];

                        echo "</li>";
                    } 
                ?>
            </ul>
        </div>
        <div id="map-canvas">
        </div>
    </div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>

</html>
