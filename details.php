<?php

session_start();

// Est ce que l'id existe et n'est pas vide dans l'URL (avec la méthode HHIP "GET")

if ( (isset($_GET['id'])) && !empty($_GET['id'])) {
    
    //On Nettoie l'id qu'on vient de recevoir
    //Pour supprimer un code malveillant éventuel
    //TODO
    $id = strip_tags($_GET['id']);

    //On se co a la BDD
    include_once('connect.php');

    //
    $sql = 'SELECT id, libelle FROM tbl_typeL WHERE id = ?;';

    // On prepare la requête
    $stmt = mysqli_prepare($bdd, $sql);

    //On relie la variale id
    mysqli_stmt_bind_param($stmt, 'i', $id);

    //On execute la requête
    mysqli_stmt_execute($stmt);

    //On définit les varaible qui vas récuperer le tpe de livre
    mysqli_stmt_bind_result($stmt,$id,$label);

    //On récupère le résultat
    mysqli_stmt_fetch($stmt);

    //On ferme a la co
    include_once('close.php');

    if (!$label) {
        $_SESSION['erreur'] = "Ce type de livre n'existe pas";

        header('Location : index.php');
        exit();
    }
} else {
    $_SESSION['erreur'] = "URL invalide";

    header('Location : index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Afficher un type de livre</title>
</head>
<body>
    
<main class="container">
    <div class="row">
        <section class="col-12">
        <h1>Détails du type de livre <?php print($label); ?></h1>
        <p>ID : <span class="badge bg-secondary"> <?php print($id); ?></span></p>
        <p>Libellé :  <span class="badge bg-secondary"><?php print($label); ?></span></p>
        <p>
        <a class="btn btn-primary" href='edit.php?id=<?php print($id); ?>'>Modifier</a><br><br>
        <a class="btn btn-secondary" href='index.php'>Retour à la liste</a><br>
        </p>
        </section>
    </div>
</main>

</body>
</html>