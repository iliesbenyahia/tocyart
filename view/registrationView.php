<?php $title= "Inscription"; ?>
<?php ob_start(); ?>

<form action="" method="POST">
	<label for="nom"> Nom </label>
	<input type="text" name="nom" id="nom">
	<label for="prenom"> Prénom </label>
	<input type="text" name="prenom" id="prenom">
	<label for="mail"> Adresse e-mail </label>
	<input type="text" name="mail" id="mail">
	<label for="telephone"> Téléphone </label>
	<input type="text" name="telephone" id="telephone">
	<label for="motdepasse"> Mot de passe </label>
	<input type="text" name="motdepasse" id="motdepasse">
	<label for="adresse"> Adresse postale </label>
	<input type="text" name="adresse" id="adresse">
	<label for="codepostal"> Code Postal</label>
	<input type="text" name="codepostal" id="codepostal">
	<label for="ville"> Commune </label>
	<input type="text" name="ville" id="ville">
	<input type="submit" value="Envoyer">
</form>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>