<!doctype html>
<html>
	<head>
		<title>
			Ophtalmologie Bruxelles Docteur Sucs
		</title>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/contact.css">
		<link rel="stylesheet" media="screen and (max-device-width:1024px)" type="text/css" href="css/css600.css" />
		<link rel="stylesheet" media="screen and (max-device-width:400px)" type="text/css" href="css/mobile.css" />


	</head>
	<body>
	    <div id="header">
		    <div id="top-bar">
				<img src="img/logo_intro.png" id="logo" alt="Logo de DR.SUCS" title="Logo de DR.SUCS" />
				<h1>Ophtalmologue/Oogarts <br/> à Bruxelles </h1>
				Sur rendez-vous
				<h2> <a href="tel:3226475509">+32(0)2 647 55 09</a></h2>
				Sauf en cas d'urgence <br/>
             </div>
             <nav>
				<ul>
				<li><a href="index.html" ><img src="images/home.png" />Acceuil</a></li>
				<li><a href="maladie.html"><img src="images/maladie.png" />Maladie</a></li>
				<li><a href="acces.html"><img src="images/accede.png" />Acces facile</a></li>
				<li><a href="contact.php" class="current"><img src="images/contact.png" />Contact</a></li>
				</ul>
            </nav>
        </div>



        <div id="content">
            <div id="adresse-a">
                Dr Franciska Sucs<br/>
                OPHTALMOLOGIE<br/>
                23 avenue Emile De Mot<br/>
                1000 Bruxelles<br/>
            </div>
            <div id="tel-mail">
                <img src="images/tel.png" /><span class="telephone"><a href="tel:3226475509">+32(0)2 647 55 09</a></span><br/>
                <img src="images/boxmail.png" /><a href="mailto:fr.sucs@gmail.com">fr.sucs@gmail.com</a><br/>
            </div>

<?php
    define( 'MAIL_TO', /* >>>>> */'yves21.haut@gmail.com'/* <<<<< */ );  //ajouter votre courriel
	define( 'MAIL_NOM', /* >>>>> */'Nom et prénom'/* <<<<< */ );
    define( 'MAIL_FROM', 'utilisateur@domaine.tld' ); // valeur par défaut
    define( 'MAIL_OBJECT', 'objet du message' ); // valeur par défaut
    define( 'MAIL_MESSAGE', 'votre message' ); // valeur par défaut

    $mailSent = false;
    $errors = array();

    if( filter_has_var( INPUT_POST, 'send' ) ) // le formulaire a été soumis avec le bouton [Envoyer]
    {
        $from = filter_input( INPUT_POST, 'from', FILTER_VALIDATE_EMAIL );
        if( $from === NULL || $from === MAIL_FROM ) // si le courriel fourni est vide OU égale à la valeur par défaut
        {
            $errors[] = 'Vous devez renseigner votre adresse de courrier électronique.';
        }
        elseif( $from === false ) // si le courriel fourni n'est pas valide
        {
            $errors[] = 'L\'adresse de courrier électronique n\'est pas valide.';
            $from = filter_input( INPUT_POST, 'from', FILTER_SANITIZE_EMAIL );
        }

        $object = filter_input( INPUT_POST, 'object', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH | FILTER_FLAG_ENCODE_LOW );
        if( $object === NULL OR $object === false OR empty( $object ) OR $object === MAIL_OBJECT ) // si l'objet fourni est vide, invalide ou égale à la valeur par défaut
        {
            $errors[] = 'Vous devez renseigner l\'objet.';
        }

        $message = filter_input( INPUT_POST, 'message', FILTER_UNSAFE_RAW );
        if( $message === NULL OR $message === false OR empty( $message ) OR $message === MAIL_MESSAGE ) // si le message fourni est vide ou égale à la valeur par défaut
        {
            $errors[] = 'Vous devez écrire un message.';
        }

        if( count( $errors ) === 0 ) // si il n'y a pas d'erreurs
        {
            if( mail( MAIL_TO, $nom, $message, "From: $from\nReply-to: $from\n" ) ) // tentative d'envoi du message
            {
                $mailSent = true;
            }
            else // échec de l'envoi
            {
                $errors[] = 'Votre message n\'a pas été envoyé.';
            }
        }
    }
    else // le formulaire est affiché pour la première fois, avec les valeurs par défaut
    {
        $nom = MAIL_NOM;
		$from = MAIL_FROM;
        $message = MAIL_MESSAGE;
    }
?>

<?php
    if( $mailSent === true ) // si le message a bien été envoyé, on affiche le récapitulatif
    {
?>
        <p id="success">Votre message a bien été envoyé.</p>
        <p><strong>Courriel pour la réponse :</strong><br /><?php echo( $from ); ?></p>
        <p><strong>Message :</strong><br /><?php echo( nl2br( htmlspecialchars( $message ) ) ); ?></p>
<?php
    }
    else // le formulaire est affiché pour la première fois ou le formulaire a été soumis mais contenait des erreurs
    {
        if( count( $errors ) !== 0 )
        {
            echo( "\t\t<ul>\n" );
            foreach( $errors as $error )
            {
                echo( "\t\t\t<li>$error</li>\n" );
            }
            echo( "\t\t</ul>\n" );
        }
        else
        {
            echo( "\t\t<p id=\"welcome\"><em></em></p>\n" );
        }
?>
        <form id='contact-nous' method="post" action="<?php echo( $_SERVER['REQUEST_URI'] ); ?>">
			<h3>Contactez Nous</h3>
			<p>
                <label for="nom">Nom et Prénom</label><br/>
                <input type="text" name="nom" id="nom" />
            </p>
            <p>
                <label for="from">Adresse email</label> <br/>
                <input type="text" name="from" id="from"  />
            </p>
            <p>
                <label for="message">Message</label> <br/>
                <textarea name="message" id="message" rows="20" cols="80"></textarea>
            </p>
            <p>
                <input type="reset" name="reset"  value="Effacer" />
                <input type="submit" name="send"  value="Envoyer" />
            </p>
        </form>
		</div><!-- content - end -->
<?php
    }
?>
            <footer>
				<div id="footer-bottom">
					2015 DR.SUCS | All right reserved | 23 avenue Emile De Mot ,1000 Bruxelles
				</div>
            </footer>



		<script type="text/javascript" src="js/vendor/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="js/vendor/jquery-cycle.js"></script>
		<script>
			$(document).ready(function() {
			$('div#mac ul').cycle({ fx:'fade', pause: 10 });
			});
		</script>
	</body>
</html>

    </body>
</html>
