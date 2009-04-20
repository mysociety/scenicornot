<?php

include_once ROOT . "/app/helper/h_place.php";

$params = sanitise($_REQUEST, array(
   'uuid' => STRING_ENCODED,
));


//
// Has the user visited before? If not, set a cookie.
//

if(!$params['uuid'])
{
   $params['uuid'] = generate_uuid();
   
   setcookie('uuid', $params['uuid']);
}


//
// Get a place
//

try
{
   $place = pick_place($params['uuid']);   
   
   try
   {
      do
      {      
         $token = rand();
      }   
      while(
         $mySQL->singleValueQuery("select token from token where token='$token'") ||
         $mySQL->singleValueQuery("select id from vote where token='$token'")
      );

      $mySQL->query("insert into token(token) values('$token')");
   }
   catch(MySQLException $e)
   {     
      error_page('500 Internal Server Error', 'Error: couldn\'t generate token', 'A database error ocurred.');
   }
   
   $auth = make_auth($place->id, $token);
   
   $image_link = local_image($place->image_uri);
   
   list($image_width, $image_height) = image_dims($place->image_uri);  
}
catch(Exception $e)
{   
   error_page('500 Internal Server Error', 'Error: couldn\'t pick a place', 'A database error ocurred.');
}


//$image_height = 600;

//
// Display
//

include VIEW_DIR . '/_home.php';

?>