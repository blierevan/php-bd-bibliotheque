<?php 
//On demarre une sesssion
session_start();

if ((isset($_GET['id_t'])) && !empty($_GET['id_t']))
{
    $id =strip_tags($_GET['id_t']);


   

    // On se connecte à la base de données
    include_once('connect.php');
    //On exécute la reque^te SQL et on stocke le résultat dans un tableau associatif 

    
    $sql ='SELECT id_t, libelle FROM Type_de_livre WHERE id_t = ?;';

    //on prepare la requete 
    $stmt = mysqli_prepare($db,$sql);

    // on relie la variable id
    mysqli_stmt_bind_param($stmt,'i',$id);

//on execute la requete
    mysqli_stmt_execute($stmt);

    //on definit les variable qui va recup le type de livre
    mysqli_stmt_bind_result($stmt, $id, $libelle);

    mysqli_stmt_fetch($stmt);

    //On ferme la connexion 
    include_once('close.php');
    if (!$libelle) {
        $_SESSION['erreur'] ="Ce type de livre n'existe pas ";

        header ('Location : index.php');
        exit();
    }
    } else {
        $_SESSION['erreur'] ="URL INVALIDE";
        header ('Location : index.php');
    exit();
    }

    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Oui</title>
    </head>
    <body>
    <main class ="container">
        <div class="row">
            <section class="col-12">
            <h1>Details du type de livre <?php print($libelle); ?></h1>
            <p>ID : <?php print($id) ;?> </p>
            <p>libelllé : <?php print($libelle); ?> </p>
            <p>
            <a class ="btn btn-info" href="index.php"> Retour à la liste </a>
            
            <a class="btn btn-primary" href='edit.php?id_t=<?php print($id);?>'>Modifier </a><br>
            
            </p>
            </section>
        </div>
    </main>
        
    </body>
    </html>