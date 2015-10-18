<?php
    define( 'MAIL_TO', 'noreply@ophtalmo-bxl.be');  //ajouter votre courriel

    $mailSent = false;
    $errors = array();

    if( filter_has_var( INPUT_POST, 'send' ) ) { // le formulaire a été soumis avec le bouton [Envoyer]
        $from = filter_input( INPUT_POST, 'from', FILTER_VALIDATE_EMAIL );
        if( $from === NULL ) { // si le courriel fourni est vide
            $errors['from'] = 'Vous devez renseigner votre adresse de courrier électronique.';
        } elseif( $from === false ) { // si le courriel fourni n'est pas valide
            $errors['from'] = 'L\'adresse de courrier électronique n\'est pas valide.';
            $from = filter_input( INPUT_POST, 'from', FILTER_SANITIZE_EMAIL );
        }

        $nom = filter_input( INPUT_POST, 'nom', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH | FILTER_FLAG_ENCODE_LOW );
        if( $nom === NULL OR $nom === false OR empty( $nom ) ) { // si le nom fourni est vide, invalide
            $errors['nom'] = 'Vous devez renseigner votre nom.';
        }

        $message = filter_input( INPUT_POST, 'message', FILTER_UNSAFE_RAW );
        if( $message === NULL OR $message === false OR empty( $message )) { // si le message fourni est vide
            $errors['message'] = 'Vous devez écrire un message.';
        }

        if( count( $errors ) === 0 ) { // si il n'y a pas d'erreurs
            if( mail( MAIL_TO, $nom, $message, "From: $from\nReply-to: $from\n" ) ) { // tentative d'envoi du message
                $mailSent = true;
            }
        }
    } else { // le formulaire est affiché pour la première fois, avec les valeurs par défaut
        $nom = '';
		$from = '';
        $message = '';
    }
?>
<!doctype html>
<!-- Balisage des microdonnées ajouté par l'outil d'aide au balisage de données structurées de Google -->
<html lang="fr">

<head>
    <?php require('parts/common-head.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/contact.css">
</head>

<body>

    <?php require('parts/social.php'); ?>

    <div class="container">

        <?php require('parts/header.php'); ?>

        <div itemscope itemtype="http://schema.org/LocalBusiness" class="content row">
            <div id="adresse">
                <span itemprop="name">Dr.F.E Sucs<br/>OPHTALMOLOGIE</span><br/>
                <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <span itemprop="streetAddress">23 avenue Emile De Mot</span><br/>
                    <span itemprop="postalCode">1000</span>
                    <span itemprop="addressLocality">Bruxelles</span>
                </span>
            </div>
            <div id="tel-mail">
                <span class="glyphicon glyphicon-earphone"></span>
                <span class="telephone">
                    <a href="tel:3226475509">
                        <span itemprop="telephone">+32(0)2 647 55 09</span>
                    </a>
                </span><br/>
                <span class="glyphicon glyphicon-envelope"></span>
                <a href="mailto:fr.sucs@gmail.com">
                    <span itemprop="email">fr.sucs@gmail.com</span>
                </a><br/>
            </div>

            <?php
            if( $mailSent === true ) { // si le message a bien été envoyé, on affiche le récapitulatif
            ?>
            <div id="success">
                <p><strong><span class="glyphicon glyphicon-ok"></span> Votre message a bien été envoyé.</strong></p>
                <p>Courriel pour la réponse : <strong><?php echo( $from ); ?></strong></p>
                <p><u>Message</u><br /><?php echo( nl2br( htmlspecialchars( $message ) ) ); ?></p>
            </div>
            <?php
            } else {
            ?>
            <form id='contact-nous' method="post" action="<?php echo( $_SERVER['REQUEST_URI'] ); ?>" class="form-horizontal">
			    <h3>Contactez Nous</h3>
			    <div class="form-group  <?php if( isset( $errors['nom'] )) { echo "has-error"; }?>">
                    <label for="nom" class="control-label col-sm-2">Nom et Prénom</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" id="nom" class="form-control" value="<?= $nom ?>" placeholder="Votre nom" required />
                        <?php if( isset( $errors['nom'] )) {
                            echo("<div class=\"errors\">".$errors['nom']."</div>");
                        } ?>
                    </div>
                </div>
                <div class="form-group  <?php if( isset( $errors['from'] )) { echo "has-error"; }?>">
                    <label for="from" class="control-label col-sm-2">Adresse email</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="from" id="from" class="form-control" value="<?= $from ?>" placeholder="Votre email" required />
                        </div>
                        <?php if( isset( $errors['from'] )) {
                            echo("<div class=\"errors\">".$errors['from']."</div>");
                        } ?>
                    </div>
                </div>
                <div class="form-group <?php if( isset( $errors['message'] )) { echo "has-error"; }?>">
                    <label for="message" class="control-label col-sm-2">Message
                        <img src="img/encrier001.png" alt="encrier" height="200" />
                    </label>
                    <div class="col-sm-10">
                        <textarea name="message" id="message" class="form-control" rows="10" cols="80" placeholder="Votre message" required><?= $message ?></textarea>
                        <?php if( isset( $errors['message'] )) {
                            echo("<div class=\"errors\">".$errors['message']."</div>");
                        } ?>
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
