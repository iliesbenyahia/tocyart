<?php $title= "Connexion"; ?>
<?php ob_start(); ?>

<form action="" method="POST">
	<label for="mail"> Adresse e-mail </label>
	<input type="text" name="mail" id="mail">
	<label for="motdepasse"> Mot de passe </label>
	<input type="text" name="motdepasse" id="motdepasse">
	<input type="submit" value = "Se connecter">
</form>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>