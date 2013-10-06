<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=megadl' , 'root' , 'athome');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$query = $bdd->prepare('INSERT INTO list(fileName, link) VALUE(:fileName, :link)');
$query->execute(array('fileName' => 'fileName', 'link' => $_POST['link']));

$lastId = $bdd->lastInsertId();

echo $lastId.';'.$_POST['link'];

$logFile = $lastId . 'mega.log';

shell_exec("./start.sh '".$_POST['link']."' '".$lastId."mega.log' &");