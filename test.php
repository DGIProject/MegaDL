<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 01/10/13
 * Time: 18:42
 * To change this template use File | Settings | File Templates.
 */
//echo shell_exec("megadl ' https://mega.co.nz/#!T9xQCDQJ!CSDNQ14X3VLDFrZRVPLrG2AiExEby0OdulHPZG48maI' > test.log &");
$id="23";
$returnExex = shell_exec("./start.sh 'https://mega.co.nz/#!odBSyLAA!aIxm2A7ERVbJwzylFHvDrispsyIdqnsrtR_mGwnl_vA' '".$id."mega.log' &");
echo $returnExex;