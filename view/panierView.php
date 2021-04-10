<?php $title= "Mon panier"; ?>
<?php ob_start(); ?>

<?php print_r($articlesDuPanier) ?>
<div id="bodyPanier">
<?php if(isset($_SESSION["panier"]) && count($_SESSION["panier"])>0){?>
<div id="lePanier">
<div class="headerPanier">
	<span id="imageHeader">Aperçu</span>
	<span id="titreHeader">Titre</span>
	<span id="prixUniHeader">Prix unitaire</span>
	<span id="quantiteHeader">Quantité</span>
	<span id="prixTotHeader">Prix total</span>


</div>
<?php
	foreach($articlesDuPanier as $articleDuPanier){
	?>
	<div class="unArticleDuPanier">
		<input type="number" class="prixCache"  value = <?= $articleDuPanier["prix"] ?> hidden>
		<div class="apercuImage">
			<img src="ressources/images/articles/<?= $articleDuPanier["id"] ?>.jpg">
		</div>
		
		<div class="infoArticlePanier"><?= $articleDuPanier["nom"]." par ".$articleDuPanier["auteur"] ?></div>
		<div class="infoPrix"><?= $articleDuPanier["prix"]." €"?></div>
		<div class="infoQuantitePanier">
			<input class ="quantiteDeLarticle" type="number" onchange="actualiserPanier(<?=$articleDuPanier["id"]?>,this.value);" value=<?=$articleDuPanier["quantite"]?> min="0" max=<?= max($articleDuPanier["quantite"], $articleDuPanier["qteStock"])?>>
		</div>
		<div class = "prixArticle">			
		</div>
	</div>


<?php
	}
?>


</div>
<div id="resumePanier">
		<h2>Total : </h2>
		<span id="prixTotal"></span>
		<button type="button">Valider la commande</button>
</div>

<?php } else { $_SESSION["info"] = "Le panier est vide :( ! ";} ?>
</div>
<script src="ressources/js/panier.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>