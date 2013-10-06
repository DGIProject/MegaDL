<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 01/10/13
 * Time: 17:39
 * To change this template use File | Settings | File Templates.
 */
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=megadl' , 'root' , 'athome');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$query = $bdd->prepare('DELETE FROM list WHERE id = :id');
$query->execute(array('id'=> $_POST['id']));
$o = fopen("../Pid".$_POST['id']."mega.log", "r");
$l = fgets($o);
$Pid = $l - 1;
shell_exec("kill ".$Pid);
echo 'true';