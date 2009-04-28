<?php

if(isset($status))
{
   http_status($status);
   
   $title = $status;
}
else
{
   $title = "Something went wrong";
}

if(!isset($heading))
{
   $heading = $error;
}

if(!isset($error))
{
   $error = "Something went wrong. If this was unexpected, please <a href='mailto:team@mysociety.org'>let us know</a>!";
}

mail('harry@thedextrousweb.com', 'ScenicOrNot error report', "http://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]\n$title\n$heading\n$error\n\nRequest: " . print_r($_REQUEST, true) . "\nMySQL: " . mysql_error() . "\nServer: " . print_r($_SERVER, true));

include VIEW_DIR . "/_error.php";

?>
