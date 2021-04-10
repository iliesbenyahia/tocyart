<?php $title=$article["nom"]; ?>
<?php ob_start(); ?>

<div id="unArticle">
<?php
	
	// id
	// nom
	// auteur
	// prix
	// qteStock
	// annee
	if(!isset($_SESSION["id"])){
		$_SESSION["info"]="Pour voir le prix de nos articles, inscrivez-vous !";
	}
	$imgsrc = "ressources/images/articles/".$article["id"].".jpg";
	
?>
	
	<?php echo '<img id ="imageArticle" src='.$imgsrc.' >'; ?>
	<div id="descriptionArticle">
	<span id="nomArticle"><?= $article["nom"]?> </span> 
	<span id="auteur"><?= $article["auteur"]?></span> 
	<span id="annee"><?= $article["annee"]?></span> 
	<?php 
	if(isset($_SESSION["id"])){ ?>
		<div id="achatPanier">
		<span id="prixArticle"><?= $article["prix"]." €"?></span>
		<form name="ajPanier" method="GET" action="<?= 'index.php?action=ajoutPanier&id='.$article["id"] ?>">
			<input type="text" hidden name="action" value ="ajoutPanier">
			<input type="text" hidden name="idArticle" value ="<?= $article["id"] ?>">
			<label for="choixQte">Choisir la quantité : </label>
			<select name="qteArticle" id="choixQte">

				<?php 
					$qteMax = $article["qteStock"];
					$i = 1;
					while($i<$qteMax && $i<6){

					
				?>
				
				    <option value="<?= $i?>"> <?= $i?></option>
				   
				 <?php $i = $i + 1;} ?>
				 <input type="submit" value = "Ajouter au panier">
			</select>

		</form>
		</div>
		</div>
	<?php } ; ?>

	<?php
	

?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>