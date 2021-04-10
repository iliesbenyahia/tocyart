<?php 
session_start();
if(isset($_POST["idArt"]) && isset($_POST["qteArt"]))
{
	if($_POST["qteArt"]!=0){
		$_SESSION["panier"][$_POST["idArt"]] = $_POST["qteArt"];
	}
	else{
		unset($_SESSION["panier"][$_POST["idArt"]]);
	}
}

?>