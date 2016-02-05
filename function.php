<?php session_start();

include "config.php";

function bdd_connect()
{
    global $bdd_host;
    global $bdd_dbName;
    global $bdd_userName;
    global $bdd_password;
    try
    {
        $bdd = new PDO("mysql:host=$bdd_host;dbname=$bdd_dbName" , $bdd_userName , $bdd_password);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    return $bdd;
}

function connectUser($username, $password)
{
    $bdd = bdd_connect();

    if (empty($username) || empty($password))
    {
        return '<div class="alert alert-danger"><strong>Error!</strong> Please fill all of fields.</div>';
    }
    else
    {
        $passwordHach = sha1($password);

        $req = $bdd->prepare('SELECT COUNT(*) AS exist FROM users WHERE username = :username AND password = :password') or die(mysql_error());
        $req->execute(array('username' => $username,'password' => $passwordHach));

        $data = $req->fetch();

        if ($data['exist'] == 0)
        {
            return '<div class="alert alert-danger"><strong>Error!</strong> Incorrect username or password.</div>';
        }
        else
        {
            $_SESSION['username'] = $username;

            header('Location: index.php');
        }

        $req->closeCursor();
    }
}

function getListMegaDL()
{
    $bdd = bdd_connect();

    $query = $bdd->prepare('SELECT * FROM list WHERE username = ? ORDER BY id');
    $query->execute(array($_SESSION['username']));

    $listMegaDL = $query->fetchAll();
    return $listMegaDL;
}