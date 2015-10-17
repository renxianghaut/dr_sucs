<!doctype html>
<html lang="fr">
<!--[if lt IE 9]>
　　　　<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

<head>
    <?php require('parts/common-head.php'); ?>
        <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>

    <div class="container">

        <?php require('parts/header.php'); ?>

        <div id="slider" class="row">
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
                <br/><span id="txtspan"> Pas loin du Bld Géneral Jacques</span>
            </div>
            <div class="col-md-6">
                <h2>Docteur F.E. SUCS</h2>
                <ul id="tata">
                    <li>Diplôme en Médecine à l'Université Libre de Bruxelles</li>
                    <li>Spécialisation en Ophtalmologie:
                        <ul>
                        <li>Albert-Ludwigs Universität Freiburg (Allemagne)</li>
                        <li>Ludwig Maximilians Universität (Munchen)</li>
                        <li>Harvard Medical School - Post Graduate Course in Ophtalmology (USA - Boston)</li>
                        <li>Université Libre de Bruxelles (hôpital Erasme)</li>
                        </ul>
                    </li>
                    <li>Trois missions ophtalmologiques au Cambodge (Médecins sans frontiéres)</li>
                </ul>
                <h2>Informations générales</h2>
                <ul>
                    <li>Examen ophtalmologique général</li>
                    <li>Examen ophtalmologique pédiatrique avec dépistage du strabisme (aussitôt que possible)</li>
                    <li>Dépistage du glaucome</li>
                    <li>Diagnostic des maladies rétiniennes</li>
                    <li>Sélection médicale : chauffeurs, conducteurs de train, pilotes, ...</li>
                    <li>Soins esthetiques</li>
                    <li>Autres examens possible</li>
                </ul>
            </div>

            <div class="col-md-3">
                <h2><span class="glyphicon glyphicon-user"></span> Membre:</h2>
                <ul>
                    <li>Membre de la Société Belge d'Ophtalmologie</li>
                    <li>Membre de la Société Allemande d'Ophtalmologie (D.O.G.)</li>
                    <li>Membre de la Société Française d’Ophtalmologie</li>
                    <li>Société belge de médecine esthétique et société allemande de médecine esthétique.</li>
                </ul>
            </div>
        </div>
        <!-- content - end -->

        <?php require('parts/footer.php'); ?>
    </div>

    <?php require('parts/common-scripts.php'); ?>

    <script type="text/javascript" src="js/vendor/jquery-cycle.js"></script>
    <script>
        $(document).ready(function () {
            $('div#slider ul').cycle({
                fx: 'fade',
                pause: 10
            });
        });
    </script>
</body>

</html>
