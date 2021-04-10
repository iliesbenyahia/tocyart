
function rafraichirPrix(){
let lesPrixDuPanier = document.getElementsByClassName("prixArticle");
let prixTotalPanier = 0;
for (var i = 0; i < lesPrixDuPanier.length; i++) 
{
		lesPrixDuPanier[i].innerHTML = Math.round(lesPrixDuPanier[i].parentNode.getElementsByClassName("prixCache")[0].value * lesPrixDuPanier[i].parentNode.getElementsByClassName("quantiteDeLarticle")[0].value * 100)/100;
	    prixTotalPanier = prixTotalPanier + parseFloat(lesPrixDuPanier[i].innerHTML);
	    lesPrixDuPanier[i].innerHTML += " €";
}
document.getElementById("prixTotal").innerHTML = Math.round(prixTotalPanier*100)/100 + " €";
}

function actualiserPanier(idArticle, quantite){

if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+...
    httpRequest = new XMLHttpRequest();
}
else if (window.ActiveXObject) { // IE 6 et antérieurs
    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
}

httpRequest.open('POST', 'http://localhost/tocyart/controller/panier.php', true);
httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
httpRequest.send("idArt="+idArticle+"&qteArt="+quantite);

httpRequest.onreadystatechange = function(){
		
		if(httpRequest.readyState == XMLHttpRequest.DONE)
		{ 
			if(httpRequest.status != 200)
			{
				alert("Il y a eu un problème d'actualisation sur une quantité d'article !");
			}
			else
			{
				if(quantite>0){
					rafraichirPrix();
				}
				else{
					document.getElementById("bodyPanier").hidden = true;
					document.location.href="index.php?action=panier";
				}
			}
		}
	

};

 }

rafraichirPrix();