<?php $pagename = basename($_SERVER['PHP_SELF']);
    if ($pagename == 'index.php') {
        $pagetitle = 'Ophtalmologie Bruxelles Docteur Sucs';
        $pagedesc = "Pour un examen des yeux, un traitement médical, ou esthétique des yeux, prenez contact avec le Dr Sucs Françoise, Ophtalmologue.";
    } else if ($pagename == 'maladie.php') {
        $pagetitle = 'Les maladie de la vue';
        $pagedesc = "Les différentes maladies de la vue.";
    } else if ($pagename == 'acces.php') {
        $pagetitle = 'Docteur Sucs - Accès';
        $pagedesc = "Comment se rendre chez l'opthalmologue Docteur Sucs";
    } else if ($pagename == 'contact.php') {
        $pagetitle = 'Docteur Sucs - Contact';
        $pagedesc = "Comment contacter ou prendre rendez-vous avec l'opthalmologue Docteur Sucs";
    }
?>

<title><?= $pagetitle ?></title>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="keywords" content="DR. SUCS, Françoise, Bruxelles, Opthalmologie, Opthalmologue, Oogarts, [Docteurs en médecine]" />
<meta name="description" content="<?=$pagedesc?>" />

<meta property="og:title" content="Opthalmologue / Oogarts à Bruxelles, Dr. Sucs"/>
<meta property="og:type" content="website"/>
<meta property="og:image" content="http://www.ophtalmo-bxl.be/img/logo_intro.png"/>
<meta property="og:url" content="http://www.ophtalmo-bxl.be/<?=$pagename?>"/>

<link rel="stylesheet" type="text/css" href="lib/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
