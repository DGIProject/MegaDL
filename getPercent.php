<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 01/10/13
 * Time: 20:54
 * To change this template use File | Settings | File Templates.
 */


if ($_POST['id'] != null) {

    $o = fopen("../Pid".$_POST['id']."mega.log", "r");
    $l = fgets($o);
    $Pid = $l - 1;
   // echo $Pid."<br>";
    //$Pid = "19102";

    shell_exec("./testPid.sh " . $Pid);
    $o = fopen("../result".$Pid.".log", "r");
    $PidTested = fgets($o);
    //echo $PidTested."<br>";

    $o = fopen("temoin.txt", "r");
    $l = fgets($o);
   // echo $l;
    $posibleValue = split(" ",$l);
  //  print_r($posibleValue);


    if ($PidTested == $posibleValue[1]) { //if == NotOK
        echo '100%';
    } else {
        $fileName = $_POST['id'] . "mega.log";
        $tab = file('../'.$fileName);
        $line = $tab[count($tab) - 1];
        // echo $line;
        $ligne2 = str_replace("[0K", '', $line);
        $ligne3 = str_replace("[37;1m", '', $ligne2);
        $ligne4 = str_replace("[0m: [32;1m", ' ', $ligne3);
        $ligne4 = str_replace("[0m", ' ', $ligne4);
        $ligne4 = str_replace("[32;1m", ' ', $ligne4);
        $ligne4 = str_replace("Â", '', $ligne4);
       // echo $ligne4 . '<br>';
        $splitedValues = split(' ', $ligne4);
      //  print_r($test);
        echo $splitedValues[1];
    }
} else {
    echo "Impossible d'effectuer l'action sans ID !";
}


