<!doctype html>
<html lang="fr">
<!--[if lt IE 9]>
　　　　<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

<head>
    <?php require('parts/common-head.php'); ?>
        <link rel="stylesheet" type="text/css" href="css/acces.css">
</head>

<body>

    <div class="container">
        <?php require('parts/header.php'); ?>
        <div class="content row">
            <h1>Notre adresse :</h1>
            <span class="address">23 avenue Emile De Mot , 1000 bruxelles</span>
            <div id="div_carte"></div>
            <div id="transport">
                <img src="images/car.png" /> - En voiture
                <p>Nous sommes situés pas loin de l'avenue Louise et du boulevard Général Jacques, parking aisé.</p>
                <img src="images/point.png" /> - Coordonnées GPS
                <p> 50°48'58.7"N 4°22'29.6"E </p>
                <img src="images/apied.png" /> - Via les transport en commun
                <p>En Tram :</p>
                <p>94 <a href="http://www.stib-mivb.be/horaires-dienstregeling2.html?linecode=94">(horaire)</a> et 7 <a href="http://www.stib-mivb.be/horaires-dienstregeling2.html?linecode=7">(horaire)</a>, arrêt Cambre-etoile</p>
                <p>93<a href="http://www.stib-mivb.be/horaires-dienstregeling2.html?linecode=93"> (horaire)</a>, arrêt Legrand </p>
                <p>En Bus </p>
                <p>71 <a href="http://www.stib-mivb.be/horaires-dienstregeling2.html?linecode=71">(horaire)</a>, arrêt Buyl </p>

            </div>
        </div>
        <!-- content - end -->

        <?php require('parts/footer.php'); ?>

    </div>
    <?php require('parts/common-scripts.php'); ?>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript">
        function initCarte() {
            var coordonnees = new google.maps.LatLng(50.816290, 4.374866);
            // création de la carte
            var oMap = new google.maps.Map(document.getElementById('div_carte'), {
                'center': coordonnees,
                'zoom': 16,
                'mapTypeId': google.maps.MapTypeId.roadmap,
            });

            var myMarker = new google.maps.Marker({
                position: coordonnees,
                map: oMap,
                title: "Dr Sucs - Ophtalmologue"
            });

        }

        // init lorsque la page est chargée
        google.maps.event.addDomListener(window, 'load', initCarte);
    </script>
</body>
</html>
