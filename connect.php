<?php 
    include('conf.php');
    
    $db = mysqli_connect (DBHOST, DBUSER,DBPASSWD, DBNAME);

    if (mysqli_connect_error()){
        $_SESSION['error']='Erreur : KO ! ' . mysqli_connect_error();
        exit();
    }
    else {
        $_SESSION['message']='Connextion à la base de données : OK !';
    }
    
    
    ?>