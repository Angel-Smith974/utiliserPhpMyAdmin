
<?php
/*
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
$reponse = $bdd->query(
    'SELECT console, nom, prix FROM jeux_video WHERE console="NES" 
    OR console="PC" ORDER BY prix DESC LIMIT 5'
    );
while ($donnees = $reponse->fetch()){
    echo '<p>' . $donnees['console'] . ' - ' . $donnees['nom'] . ' - ' . $donnees['prix'] . '€' . '<p>' ;
}
*/
?>

<!--
    MOTS CLE et ordre d'écriture (voir exemple ci-dessus) :
    SELECT nomDeLentrée ou * qui veux dire toute les entrée FROM nomDeLaTable WHERE nomDeLentrée="nomDeLaDonnée" ou plusieurs entrée avec un OR ou AND nomDeLaTable. Si on veux utiliser un classement par ordre alphabetique ou numérique on utilise ORDER BY nomDeLentrée et si on le veux en décroissant après le nom de l'entrée mettre DESC. Si on veux mettre une limite on écrit LIMIT et le nombre qu'on veux.
-->


<?php
if(isset($_GET['console'])){
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $requete = $bdd->prepare('SELECT * FROM jeux_video WHERE console= ?');
    $requete->execute(array($_GET['console']));

    while ($donnees = $requete->fetch()){
        echo '<p>' . $donnees['console'] . ' - ' . $donnees['nom'] . ' - ' . $donnees['prix'] . '€' . '<p>' ;
}
}

?>