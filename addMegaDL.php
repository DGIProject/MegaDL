<?php session_start();

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=megadl' , 'root' , 'athome');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$query = $bdd->prepare('INSERT INTO list(username, link) VALUE(:username, :link)');
$query->execute(array('username' => $_SESSION['username'], 'link' => $_POST['link']));

$lastId = $bdd->lastInsertId();

echo $lastId.';'.$_POST['link'];

$logFile = $lastId . 'mega.log';

shell_exec("./start.sh '".$_POST['link']."' '".$lastId."mega.log' &");