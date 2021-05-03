<form>
Type : <input type='text' name='type'><br>
<input type="submit">


<?php

$type = $_GET['type'];

$bdd = mysqli_connect('mysql-hugo-jenouvrier.alwaysdata.net','230464_cdi','Bibliotheque50*','hugo-jenouvrier_bibliotheque');

$resultat = mysqli_query( $bdd, 'INSERT INTO tbl_typeL (;');

echo 'Il y a '. mysqli_num_rows($resultat) . ' entrée(s) dans la base de donnés <br>';

while($donnees = mysqli_fetch_assoc($resultat)){
    echo $donnees['Id'] . ' ' .$donnees['libelle'].'</br>';
}

echo "<a href='ajouter.php'>Ajouter</a>";
?>
