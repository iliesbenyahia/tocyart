<?php $title= "Accueil"; ?>
<?php ob_start(); ?>
<h1>Nous vous souhaitons la bienvenue sur ToCyArt</h1>
<p>ToCyArt est le leader de la vente de reproductions de peintures à taille réelle pour embellir vos intérieurs ! </p>



<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>