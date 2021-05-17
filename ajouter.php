<?php

session_start();

$type = strip_tags($_GET['type']);

include_once('connect.php');

$sql = 'INSERT INTO tbl_typeL (libelle) VALUES (?);';

$stmt = mysqli_prepare($bdd, $sql);

mysqli_stmt_bind_param($stmt, 's', $type);

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt,$type);

mysqli_stmt_fetch($stmt);

include_once('close.php');

header('Location: index.php');
?>
