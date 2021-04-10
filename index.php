<?php
session_start();
require('controller/controller.php');
print_r($_SESSION);
if(isset($_GET['action']))
{
	if($_GET['action']=='inscription'){
		registration();
	}
	if($_GET['action']=='connexion'){
		login();
	}
	if($_GET['action']=='deconnexion'){
		signOut();
	}
	if($_GET['action']=='articles'){
			articles();
	}
	if($_GET['action']=='article'){
		article($_GET['id']);
	}
	if($_GET['action']=='ajoutPanier')
	{
		ajouterPanier($_GET["idArticle"], $_GET["qteArticle"]);
	}
	if($_GET['action']=='panier')
	{
		panier();
	}

}
else
{
	homepage();
}


