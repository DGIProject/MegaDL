<?php
function bdd_connect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=megadl' , 'root' , 'athome');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    return $bdd;
}

function getListMegaDL()
{
    $bdd = bdd_connect();

    $query = $bdd->prepare('SELECT * FROM list ORDER BY id');
    $query->execute();

    $listMegaDL = $query->fetchAll();
    return $listMegaDL;
}