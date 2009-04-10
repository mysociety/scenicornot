<?php

include "../prepend.php";

include ROOT . "/include/global.php";

echo date('r') . " Updating rand column... \n";

//
// This is lots of queries instead of one big one
// so that the table doesn't get locked (and stop the
// site from working) while this update happens
//

$mySQL->query("select * from place");
$subMySQL = clone $mySQL;

while($place = $mySQL->fetchObject())
{
   $subMySQL->query("update place set rand=rand() where id=$place->id");
}


echo date('r') . " Done.\n";

?>
