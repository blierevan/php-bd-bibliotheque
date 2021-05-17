<?php

session_start();

include_once('connect.php');

include_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Ajouter un type de livre</title>
</head>
<body>
    
<main class="container">
    <div class="row">
        <section class="col-12">
        <h1>Ajouter un type de livre</h1>
        <form action='ajouter.php'>
        <label class="form-label"> Type :</label> 
        <input class="form-control" type='text' name='type' required><br><br>
        <input class="btn btn-primary" type="submit"><br><br>
        <a class="btn btn-secondary" href='index.php'>Retour à la liste</a>
        </section>
    </div>
</main> 




</body>
</html>