<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 01/10/13
 * Time: 20:54
 * To change this template use File | Settings | File Templates.
 */

include "config.php";

if ($_POST['id'] != null) {

    $o = fopen($phpLogPath."Pid".$_POST['id']."mega.log", "r");
    $l = fgets($o);
    $Pid = $l - 1;

    shell_exec("./testPid.sh " . $Pid);
    $o = fopen($phpLogPath."result".$Pid.".log", "r");
    $PidTested = fgets($o);

    $o = fopen("temoin.txt", "r");
    $l = fgets($o);
    $posibleValue = split(" ",$l);


    if ($PidTested == $posibleValue[1]) { //if == NotOK
        $fileName = $_POST['id'] . "mega.log";
        $tab = file($phpLogPath.$fileName);
        $line = $tab[count($tab) - 1];
        $ligne2 = str_replace("[0K", '', $line);
        $ligne3 = str_replace("[37;1m", '', $ligne2);
        $ligne4 = str_replace("[0m: [32;1m", ' ', $ligne3);
        $ligne4 = str_replace("[0m", ' ', $ligne4);
        $ligne4 = str_replace("[32;1m", ' ', $ligne4);
        $ligne4 = str_replace("Â", '', $ligne4);
        $splitedValues = split(' ', $ligne4);
        //print_r($splitedValues);
        echo "100%;;".$splitedValues[0].";;".$splitedValues[9].";;".$splitedValues[10].";;".$splitedValues[9].";;".$splitedValues[10];

    } else {
        $fileName = $_POST['id'] . "mega.log";
        $tab = file($phpLogPath.$fileName);
        $line = $tab[count($tab) - 1];
        $ligne2 = str_replace("[0K", '', $line);
        $ligne3 = str_replace("[37;1m", '', $ligne2);
        $ligne4 = str_replace("[0m: [32;1m", ' ', $ligne3);
        $ligne4 = str_replace("[0m", ' ', $ligne4);
        $ligne4 = str_replace("[32;1m", ' ', $ligne4);
        $ligne4 = str_replace("Â", '', $ligne4);
        $splitedValues = split(' ', $ligne4);
        //print_r($splitedValues);
        echo $splitedValues[1].";;".$splitedValues[0].";;".$splitedValues[5].";;".$splitedValues[6].";;".$splitedValues[9].";;".$splitedValues[10];
    }
} else {
    echo "Impossible d'effectuer l'action sans ID !";
}


