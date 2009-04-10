<?php

include_once ROOT . "/app/helper/h_place.php";

$params = sanitise($_REQUEST, array(
   'uuid' => STRING_ENCODED,
   'token' => STRING_ENCODED,
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
   $_SESSION['place'] = $place->id;
   
   $token = $_SESSION['token'] = rand();
   
   $image_link = local_image($place->image_uri);
   
   $dims = image_dims($place->image_uri);  
   
   $image_width = $dims[0];
   $image_height = $dims[1];
   
   if($image_width > 450)
   {
      $factor = $image_width / 450;
      
      $image_width = 450;
      $image_height = round($image_height/$factor);
   }
}
catch(Exception $e)
{
   // TODO: Go to an error message view
   
   error_page('500 Internal Server Error', 'Error: couldn\'t pick a place', 'A database error ocurred.');
}


//$image_height = 600;

//
// Display
//

include VIEW_DIR . '/_home.php';

?>