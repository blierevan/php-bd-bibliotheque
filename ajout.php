<html>
<head>
  <title>	PHP - Ajouter n�6	</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<h1 align=center> PHP - Exemple n�6 </h1>
<h2 align=center> Consultation d'une Base de Donn�es <br>
par un Programme sur le Serveur </h2>
<hr><br>

<center>

<?php
  $love  = $_GET ['love']   ;

  
  //--- Connection au SGBDR 
  $DataBase = mysqli_connect ( "mysql-seblah.alwaysdata.net" , "seblah_cdi" , "Bibliotheque50*" ) ;

  //--- Ouverture de la base de donn�es
  mysqli_select_db ( $DataBase, "seblah_bibliotheque" ) ;

  //--- Pr�paration de la requ�te
  $Requete = "INSERT INTO Type_de_livre ( id_t ,libelle )
                  VALUES ('','$love');";
    
  //--- Ex�cution de la requ�te (fin du script possible sur erreur ...)
  $Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;

  //--- D�connection de la base de donn�es
  mysqli_close ( $DataBase ) ;  
?>

</center>
<p> <?php  print('$love');  ?> à bien été ajouter à la liste <P>
<br>
<a href='index.php'>Retour à la liste</a>
<br>

<hr>
</BODY>
</HTML>
