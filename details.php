<?php

session_start();

// Est ce que l'id existe et n'est pas vide dans l'URL (avec la méthode HHIP "GET")

if ( (isset($_GET['id'])) && !empty($_GET['id'])) {
    
    //On Nettoie l'id qu'on vient de recevoir
    //Pour supprimer un code malveillant éventuel
    //TODO

    //On se co a la BDD
    include_once('connect.php');

    //On ferme a la co
    include_once('conf.php');
} else {
    # code...
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher un type de livre</title>
</head>
<body>
    
<!-- TODO Afficher le détail du type de livre -->

</body>
</html>