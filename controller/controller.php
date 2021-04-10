<?php
require('model/model.php');

function homepage() //affichage de la page d'accueil
{
	require('view/homepageView.php');
}

function registration() //inscription d'un utilisateur, avec vérification en PHP, en plus du Javascript
{
	require('view/registrationView.php');
	if(count($_POST)>0){
		if($_POST['mail'] != "" && $_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['motdepasse'] != "" && $_POST['adresse'] != "" && $_POST['codepostal'] != "" && $_POST['ville'] != "" && !thisUserAlreadyExists($_POST['mail'])){

			insertUser($_POST['mail'], $_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['motdepasse'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville']);
			$_SESSION["info"] = "L'utilisateur a bien été inséré ";
			header('Location: index.php');	
		}
		else{
			$_SESSION["error"] = "Erreur : l'utilisateur existe déjà";
		}	
	}

}

function articles(){	
	$articles = getAllArticles();
	require('view/articlesView.php');
}

function article($idArticle){
	$article = getArticle($idArticle);
	require('view/articleView.php');

}

function login() //connexion de l'utilisateur
{
	require('view/connexionView.php');
	if(count($_POST)>0){
		if($_POST['mail'] != "" && $_POST['motdepasse'] != "")
		{
			$id = userLogin($_POST['mail'], $_POST['motdepasse'])->fetch(PDO::FETCH_NUM);
			if($id)
			{
				$userInfo = getUserInfo($id[0])->fetch(PDO::FETCH_ASSOC);
				$_SESSION["id"]=$userInfo["id"];
				$_SESSION["userFirstname"]=$userInfo["prenom"];
				$_SESSION["userLastname"]=$userInfo["nom"];
				$_SESSION["info"] = 'Bonjour '.$userInfo["prenom"]. ' !';
				$_SESSION["panier"]= array(); //création du panier
				header('Location: index.php');
			}
			else
			{
				$_SESSION["error"] = "Identifiants incorrects ou inexistants.";
			}
		}
	}
}

function signOut()
{
	session_destroy();
	session_start();
	$_SESSION['info'] = "Vous avez bien été deconnecté";
	header('Location: index.php');
}

function panier(){
	if(isset($_SESSION["panier"])){
		$articlesDuPanier = array();
		foreach(array_keys($_SESSION["panier"]) as $idArticle){
			array_push($articlesDuPanier, getArticle($idArticle));
		}
		$i =0;
		for($i =0; $i<count($articlesDuPanier);$i++) //on ajoute la quantité totale par article à chaque article du panier dans le tableau $articlesDuPanier
		{
			$articlesDuPanier[$i]["quantite"] = $_SESSION["panier"][$articlesDuPanier[$i]["id"]];
			$articlesDuPanier[$i]["prixTotal"] = $articlesDuPanier[$i]["quantite"] * $articlesDuPanier[$i]["prix"];
		}
		
	}
	require('view/panierView.php');

}

function ajouterPanier($idArticle, $quantite){
	if(isset($_SESSION["panier"][$idArticle])){
		$_SESSION["panier"][$idArticle] += $quantite;
	}
	else{
		$_SESSION["panier"][$idArticle] = $quantite;
	}
	header('Location: index.php?action=panier');
}

