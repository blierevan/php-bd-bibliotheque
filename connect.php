<?php

include('conf.php');

try {
    $bdd = mysqli_connect(DBHOST,DBUSER,DBPSWD,DBNAME);
} catch (\Throwable $e) {
    $_SESSION['error'] = 'Erreur de co a la BDD: ' . $e->getMessage();
}


if (mysqli_connect_errno()){
    $_SESSION['error'] = 'Erreur de co a la BDD: ' . mysqli_connect_error();
    exit();
}
else {
    $_SESSION['Message'] = 'Connexion OK !';
}
?>