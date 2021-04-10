<?php $title= "Nos produits"; ?>
<?php ob_start(); ?>

<div id="articles">
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
	foreach($articles as $article)
	{
		$imgsrc = "ressources/images/articles/".$article["id"].".jpg";
		?>
		<a href=<?="index.php?action=article&id=".$article["id"]?>><div class ="article">
		<?php echo '<img id ="imageArticle" src='.$imgsrc.' >'; ?>
		<span id="nomArticle"><?= $article["nom"]?> </span> 
		<span id="auteur"><?= $article["auteur"]?></span> 
		<span id="annee"><?= $article["annee"]?></span> 
		<?php 
		if(isset($_SESSION["id"])){ ?>
			<span id="prixArticle"><?= $article["prix"]?></span> 
		<?php } ; ?>
		
		</div>
		</a>
		<?php
	}

?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>