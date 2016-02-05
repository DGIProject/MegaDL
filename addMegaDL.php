<?php session_start();

include "function.php";


$bdd = bdd_connect();


$query = $bdd->prepare('INSERT INTO list(username, link) VALUE(:username, :link)');
$query->execute(array('username' => $_SESSION['username'], 'link' => $_POST['link']));

$lastId = $bdd->lastInsertId();

echo $lastId . ';' . $_POST['link'];

$logFile = $lastId . 'mega.log';

shell_exec("./start.sh '" . $_POST['link'] . "' '" . $lastId . "mega.log' '" . $_SESSION['username'] . "'&");