<?php
// Un tableau de moutons
$moutons = [['Danny', 75], ['Richard',60]];

// J'ajoute un mouton
array_push($moutons, ['Gérard',120]);

// Je calcule la moyenne de la valeur de mes moutons

function calculMoyMoutons($untableauDeMoutons){ //Je décide de créer une fonction pour calculer la moyenne étant donné que l'on va calculer la moyenne plusieurs fois (même s'il ne s'agit que de 2 fois dans notre cas)
	$sumValMoutons=0;
	foreach ($untableauDeMoutons as $mouton) {
		$sumValMoutons += $mouton[1];
	} 
	return $sumValMoutons/count($untableauDeMoutons);

}

echo "Moyenne de la valeur de mes ". count($moutons)." moutons : ".calculMoyMoutons($moutons);

// Ajout de 100 moutons aléatoires
for ($j=0; $j < 100; $j++) { 
	//J'ai enlevé l'utilisation de plusieurs variables "intermédiaires"
	$randNameMouton = "";
    $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSUTVWXYZ";
	for($k=0; $k<rand(3,15); $k++)
    {
        $randNameMouton .= $chaine[rand(0, (strlen($chaine)-1))];
    }
	array_push($moutons, [$randNameMouton, rand(10,200)]);
}

echo PHP_EOL; //Je l'ai laissé, si j'ai bien compris cela permet de déterminer le bon caractère de saut de ligne en fonction du système d'exploitation où le script est exécuté

// Je calcule à nouveau la moyenne
echo "Moyenne de la valeur de mes ". count($moutons)." moutons : ".calculMoyMoutons($untableauDeMoutons);
print_r($moutons); //debug

