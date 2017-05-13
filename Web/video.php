<?php
$title = "Video";
include "header.php";
?>
<script>
    var video = document.getElementById("add");
    document.getElementById("duration").innerHTML = video.duration;
</script>

<section class="wrapper style2 special">
    <div id="tone" class="container">
        <header>
            <h2>Merci de votre participation et bon visionnage.</h2>
        </header>

        <video id="add" width="80%" height="80%" autoplay>
            <source src="video/Les%20Tartes%20aux%20Myrtilles.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <p>Cette vidéo durera : <span id="duration"></span></p>
    </div>
</section>

<?php include "footer.php";?>
