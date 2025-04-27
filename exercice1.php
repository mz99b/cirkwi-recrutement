<?php
echo "[PHP] Exercice 1\n";

// Un tableau de moutons
$moutons = [['Danny', 75], ['Richard',60]];

// J'ajoute un mouton
array_push($moutons, ['Gérard',120]);

// Je calcule la moyenne de la valeur de mes moutons
$i=0;
$nbMoutons=0;
$sumValMoutons=0;
foreach ($moutons as $mouton) {
	$sumValMoutons = $sumValMoutons + $mouton[1];
	$nbMoutons++;
	$i++;
} $moyValMoutons = $sumValMoutons/$i;echo "Moyenne de la valeur de mes ". count($moutons)." moutons : ".$sumValMoutons/$i;

// Ajout de 100 moutons aléatoires
for ($j=0; $j < 100; $j++) { 
	$randNameMouton = "";
	$nbCharsNameMouton=rand(3,15);
    $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSUTVWXYZ";
    $nbChars = strlen($chaine);
	$randValMoutons = rand(10,200);
	for($k=0; $k<$nbCharsNameMouton; $k++)
    {
        $randNameMouton .= $chaine[rand(0, ($nbChars-1))];
    }
	array_push($moutons, [$randNameMouton, $randValMoutons]);
}
echo PHP_EOL;
// Je calcule à nouveau la moyenne
$i=0;
$nbMoutons=0;
$sumValMoutons=0;
foreach ($moutons as $mouton) {
	$sumValMoutons = $sumValMoutons + $mouton[1];
	$nbMoutons++;
	$i++;
} $moyValMoutons = $sumValMoutons/$i;echo "Moyenne de la valeur de mes ". count($moutons)." moutons : ".$sumValMoutons/$i;

echo "\n[-------------------------------------------------------------]\n";

// Factorisez au mieux le code ci-dessus
// ⚠ Dans votre code n'hésitez pas à laissez des remarques sur de futures améliorations possibles.

echo "[PHP] Exercice 1 - Factorisé\n";

// Démarrage du chrono pour la méthode factorisée
$debut2 = microtime(true);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Afin de factoriser le code, j'opte pour creer une fonction par tache, ce qui rend le code plus lisible et un peu plus court
//
//
// Fonction pour calculer la moyenne des valeurs des moutons qui prend un tableau de moutons en paramètre et qui retourne la moyenne
function calculerMoyenneMoutons(array $moutons): float {
    $sumValMoutons = array_sum(array_column($moutons, 1));
    return $sumValMoutons / count($moutons);
}

// Fonction pour générer un nom aléatoire qui prend en paramètre la longueur du nom
// et qui retourne un nom aléatoire de cette longueur
function genererNomAleatoire(int $longueur): string {
    $chars = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSUTVWXYZ";
    return substr(str_shuffle($chars), 0, $longueur);
}

// Fonction pour ajouter des moutons aléatoires qui prend un tableau de moutons et un nombre de moutons à ajouter en paramètre
function ajouterMoutonsAleatoires(array &$moutons, int $nombre): void {
    for ($i = 0; $i < $nombre; $i++) {
        $nom = genererNomAleatoire(rand(3, 15));
        $valeur = rand(10, 200);
        $moutons[] = [$nom, $valeur];
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Initialisation du tableau de moutons
$moutons = [['Danny', 75], ['Richard', 60]];

// Ajout d'un mouton
$moutons[] = ['Gérard', 120];

// Affichage de la première moyenne
echo "Moyenne de la valeur de mes " . count($moutons) . " moutons : " . calculerMoyenneMoutons($moutons);
echo PHP_EOL;

// Ajout de 100 moutons aléatoires
ajouterMoutonsAleatoires($moutons, 100);

// Affichage de la nouvelle moyenne
echo "Moyenne de la valeur de mes " . count($moutons) . " moutons : " . calculerMoyenneMoutons($moutons);

echo "\n[-------------------------------------------------------------]";

// Affichage des ameliorations possibles
echo "\n[AMELIORATION] Afin d'ameliorer ce code on pourrait tester les parametres
 et ajouter les moutons dans une base de donnees pour ne pas surcharger la memoire";

?>
