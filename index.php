<!doctype html>
<html lang="fr">
<!--[if lt IE 9]>
　　　　<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

<head>
    <?php require('parts/common-head.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/jquery.simplyscroll.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<link href="css/lightbox.css" rel="stylesheet">

	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/lightbox.js"></script>
</head>

<body>

    <?php require('parts/social.php'); ?>

    <div class="container">

        <?php require('parts/header.php'); ?>

        <div id="slider" class="row hidden-xs">
            <ul>
                <li><img src="img/slider-a.jpg" alt="pub" /></li>
                <li><img src="img/slider-b.jpg" alt="pub" /></li>
                <li><img src="img/porte.jpg" alt="pub" /></li>
            </ul>
        </div>

        <div class="row content">
            <div class="col-md-3 index-left">
                <img src="img/eye.jpg" />
                <h2>Consultations</h2>
                <span id="langue">En français, nederlands, deutsch, english, magyar.</span>
                <h2>Situé</h2>
                en face de l'abbaye de la Cambre (entre l'Avenue Louise et l'Avenue Franklin Roosevelt),
                <br/> près de ULB
            </div>
            <div class="col-md-6">
                <div class="section">
                    <h2>Docteur F.E. SUCS</h2>
                    <ul>
                        <li>Diplôme en Médecine à l'Université Libre de Bruxelles</li>
                        <li>Spécialisation en Ophtalmologie:
                            <ul>
                            <li>Albert-Ludwigs Universität Freiburg (Allemagne)</li>
                            <li>Ludwig Maximilians Universität (Munchen)</li>
                            <li>Harvard Medical School - Post Graduate Course in Ophthalmology (USA)</li>
                            <li>Université Libre de Bruxelles (hôpital Erasme)</li>
                            </ul>
                        </li>
                        <li>Trois missions ophtalmologiques au Cambodge (Médecins sans Frontiéres)</li>
                        <li>Formation intensive pratique en Médecine esthétique, Hamburg (Allemagne): traitement anti-ride sans scalpel (Faltentherapie ohne Skalpell intensive workshop)</li>
                    </ul>
                </div>
                <div class="section">
                    <h2>Informations générales</h2>
                    <ul>
                        <li>Examen ophtalmologique général</li>
                        <li>Examen ophtalmologique pédiatrique avec dépistage du strabisme </li>
                        <li>Dépistage du glaucome</li>
                        <li>Diagnostic des maladies rétiniennes</li>
                        <li>Sélection médicale : chauffeurs, conducteurs de train, pilotes, ...</li>
                        <li>Soins esthetiques:r</li>
                    </ul>
                </div>
                <div class="photos">
                    <ul id="scroller">
                        <li><a href="img/entree.jpg" rel="lightbox[roadtrip]"><img src="img/entree.jpg" /></a></li>
                        <li><a href="img/lunette.jpg" rel="lightbox[roadtrip]"><img src="img/lunette.jpg" /></a></li>
                        <li><a href="img/coin.jpg" rel="lightbox[roadtrip]"><img src="img/coin.jpg" /></a></li>
                        <li><a href="img/imeuble.jpg" rel="lightbox[roadtrip]"><img src="img/imeuble.jpg" /></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <h2><span class="glyphicon glyphicon-user"></span> Membre de</h2>
                <ul>
                    <li>la Société Belge d'Ophtalmologie</li>
                    <li>la Société Allemande d'Ophtalmologie (D.O.G.)</li>
                    <li>la Société Française d’Ophtalmologie</li>
                    <li>Société belge de Médecine esthétique et société allemande de Médecine esthétique.</li>
                </ul>
            </div>
        </div>
        <!-- content - end -->

        <?php require('parts/footer.php'); ?>
    </div>

    <?php require('parts/common-scripts.php'); ?>

    <script type="text/javascript" src="js/vendor/jquery-cycle.js"></script>
    <script type="text/javascript" src="js/vendor/jquery.simplyscroll.min.js"></script>
    <script>
        $(document).ready(function () {
            $('div#slider ul').cycle({
                fx: 'fade',
                pause: 10
            });
        });
    </script>
    <script type="text/javascript">
        (function($) {
            $(function() { //on DOM ready
                    $("#scroller").simplyScroll({pauseOnHover:false});
            });
         })(jQuery);
    </script>
</body>

</html>
