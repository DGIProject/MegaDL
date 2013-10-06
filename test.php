<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Guillaume
 * Date: 01/10/13
 * Time: 18:42
 * To change this template use File | Settings | File Templates.
 */
//echo shell_exec("megadl ' https://mega.co.nz/#!T9xQCDQJ!CSDNQ14X3VLDFrZRVPLrG2AiExEby0OdulHPZG48maI' > test.log &");
$returnExex = shell_exec("megadl 'https://mega.co.nz/#!T9xQCDQJ!CSDNQ14X3VLDFrZRVPLrG2AiExEby0OdulHPZG48maI' --path /home/share/ > /var/www/file.txt &");
echo $returnExex;