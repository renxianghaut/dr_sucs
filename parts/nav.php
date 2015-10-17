<nav>
    <ul>
        <li><a href="index.php" <?php if ($pagename=='index.php') { echo "class=\"current\""; } ?>><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
        <li><a href="maladie.php" <?php if ($pagename=='maladie.php') { echo "class=\"current\""; } ?>><span class="glyphicon glyphicon-eye-open"></span> Maladie</a></li>
        <li><a href="acces.php" <?php if ($pagename=='acces.php') { echo "class=\"current\""; } ?>><span class="glyphicon glyphicon-road"></span> Acces facile</a></li>
        <li><a href="contact.php" <?php if ($pagename=='contact.php') { echo "class=\"current\""; } ?>><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
    </ul>
</nav>
