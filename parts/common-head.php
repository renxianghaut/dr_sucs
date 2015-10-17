<?php $pagename = basename($_SERVER['PHP_SELF']);
    if ($pagename == 'index.php') {
        $pagetitle = '';
    } else if ($pagename == 'maladie.php') {
        $pagetitle = ' - Maladie';
    } else if ($pagename == 'acces.php') {
        $pagetitle = ' - Accès';
    } else if ($pagename == 'contact.php') {
        $pagetitle = ' - Contact';
    }
?>

<title>Ophtalmologie Bruxelles Docteur Sucs<?= $pagetitle ?></title>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="keywords" content="DR. SUCS, Françoise, Bruxelles, Opthalmologie, Opthalmologue, Oogarts, [Docteurs en médecine]" />
<meta name="description" content="Pour un examen des yeux, un traitement médical, ou esthétique des yeux, prenez contact avec le Dr Sucs Françoise, Ophtalmologue." />

<meta property="og:title" content="Opthalmologue / Oogarts à Bruxelles, Dr. Sucs"/>
<meta property="og:type" content="website"/>
<meta property="og:image" content="http://www.ophtalmo-bxl.be/img/logo_intro.png"/>
<meta property="og:url" content="http://www.ophtalmo-bxl.be/<?=$pagename?>"/>

<link rel="stylesheet" type="text/css" href="lib/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" media="screen and (max-device-width:1024px)" type="text/css" href="css/css600.css">
<link rel="stylesheet" media="screen and (max-device-width:400px)" type="text/css" href="css/mobile.css">
