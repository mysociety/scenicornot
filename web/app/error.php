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

include VIEW_DIR . "/_error.php";

?>
