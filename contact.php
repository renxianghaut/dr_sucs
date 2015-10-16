<?php
    define( 'MAIL_TO', /* >>>>> */'noreply@ophtalmo-bxl.be'/* <<<<< */ );  //ajouter votre courriel
	define( 'MAIL_NOM', /* >>>>> */''/* <<<<< */ );
    define( 'MAIL_FROM', '' ); // valeur par défaut
    define( 'MAIL_MESSAGE', '' ); // valeur par défaut

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

        $nom = filter_input( INPUT_POST, 'nom', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH | FILTER_FLAG_ENCODE_LOW );
        if( $nom === NULL OR $nom === false OR empty( $nom ) OR $nom === MAIL_NOM ) // si le nom fourni est vide, invalide ou égale à la valeur par défaut
        {
            $errors[] = 'Vous devez renseigner votre nom.';
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
<!doctype html>
<html lang="fr">

<head>
    <?php require('parts/common-head.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/contact.css">
</head>

<body>
    <div class="container">

        <?php require('parts/header.php'); ?>

        <div class="content row">
            <div id="adresse">
                Dr Franciska Sucs<br/>
                OPHTALMOLOGIE<br/>
                23 avenue Emile De Mot<br/>
                1000 Bruxelles<br/>
            </div>
            <div id="tel-mail">
                <span class="glyphicon glyphicon-phone"></span><span class="telephone"><a href="tel:3226475509">+32(0)2 647 55 09</a></span><br/>
                <span class="glyphicon glyphicon-envelope"></span><a href="mailto:fr.sucs@gmail.com">fr.sucs@gmail.com</a><br/>
            </div>

            <?php
            if( $mailSent === true ) { // si le message a bien été envoyé, on affiche le récapitulatif
            ?>

            <p id="success">Votre message a bien été envoyé.</p>
            <p><strong>Courriel pour la réponse :</strong><br /><?php echo( $from ); ?></p>
            <p><strong>Message :</strong><br /><?php echo( nl2br( htmlspecialchars( $message ) ) ); ?></p>

            <?php
            } else { // le formulaire est affiché pour la première fois ou le formulaire a été soumis mais contenait des erreurs
                if( count( $errors ) !== 0 ) {
                    echo("<ul>");
                    foreach( $errors as $error ) {
                        echo("<li>$error</li>");
                    }
                    echo("</ul>");
                } else {
                    echo("<p id=\"welcome\"><em></em></p>");
                }
            ?>
            <form id='contact-nous' method="post" action="<?php echo( $_SERVER['REQUEST_URI'] ); ?>" class="form-horizontal">
			    <h3>Contactez Nous</h3>
			    <div class="form-group">
                    <label for="nom" class="control-label col-sm-2">Nom et Prénom</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" id="nom" class="form-control" value="<?= $nom ?>" placeholder="Votre nom" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="from" class="control-label col-sm-2">Adresse email</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="from" id="from" class="form-control" value="<?= $from ?>" placeholder="Votre email" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="control-label col-sm-2">Message</label>
                    <div class="col-sm-10">
                        <textarea name="message" id="message" class="form-control" rows="10" cols="80" placeholder="Votre message" required><?= $message ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-10">
                        <input type="submit" name="send" value="Envoyer" class="btn btn-success" />
                        <input type="reset" name="reset" value="Effacer" class="btn btn-default" />
                    </div>
                </div>
            </form>
            <?php
            }
            ?>
		</div><!-- content - end -->

        <?php require('parts/footer.php'); ?>
    </div>
    <?php require('parts/common-scripts.php'); ?>

</body>
</html>
