<?php

function dbConnect(){
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=benyahiaDautecourt;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function thisUserAlreadyExists($usermail){
    $db = dbConnect();
    $req = $db->prepare('SELECT id FROM utilisateur WHERE mail = ?');
    $req->execute(array($usermail));
    if(count($req->fetchAll())>0){
        return true;
    }
    else
    {
        return false;
    }
}

function userLogin($mail, $password){
    $db = dbConnect();
    $req = $db->prepare('SELECT id FROM utilisateur WHERE mail = ? AND motdepasse = ?');
    $req->execute(array($mail, $password));
    return $req;  
}

function getUserInfo($userId){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM utilisateur WHERE id = ?');
    $req->execute(array($userId));
    return $req;  
}

//insertion d'un utilisateur de la base (lors de l'inscription notamment)
function insertUser($mail, $nom, $prenom, $telephone, $motdepasse, $adresse, $codepostal, $ville){
	$db = dbConnect();	
	$utilisateur = $db->prepare('INSERT INTO utilisateur(mail, nom, prenom, telephone, motdepasse, adresse, codepostal, ville) VALUES(?,?,?,?,?,?,?,?)');
	$affectedLines = $utilisateur->execute(array($mail, $nom, $prenom, $telephone, $motdepasse, $adresse, $codepostal, $ville));
	return $affectedLines;	
}

function getAllArticles(){
    $db = dbConnect();
    $query= $db->prepare('SELECT * FROM articles');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getArticle($articleID){
    $db = dbConnect();
    $query= $db->prepare('SELECT * FROM articles WHERE id = ?');
    $query->execute(array($articleID));
    return $query->fetch(PDO::FETCH_ASSOC);
}
