<?php

//
// Pick a suitable place for the user to rate
//
// The place should:
//
//  - Not be one that the user has already seen
//  - Have been ranked between 1 and 3 times already
//
// If these criteria cannot be met, pick a random place
//

function pick_place($uuid)
{
   global $mySQL;
   
   define('DEBUG', false);
   
   if(DEBUG)
   {
      echo "<pre>";
   }

   $limit = 100;
   
   # Try to pick a new image with 1-3 votes, to get it up to 4
   $mySQL->query("
      select * from place
      where
             place.id not in (select place from vote where uuid = '{$uuid}')
         and (select count(*) from vote where place=place.id) >= 1
         and (select count(*) from vote where place=place.id) <= 3
      order by rand
      limit 0,$limit
   ", DEBUG);

   # If that fails, quickly try a few entries from the database at random
   if (!$mySQL->numRows()) {
        for ($k=1; $k<=5; $k++) {
            $rand = rand(1, 217674); # XXX
            $mySQL->query("select *, (select count(*) from vote where place=place.id) as votes
                from place where id=$rand and id not in (select place from vote where uuid='$uuid')");
            $place = $mySQL->fetchObject();
            if ($place && $place->votes <= 3) {
                return $place;
            }
        }
   }

   # If that didn't work, just pick one that the user hasn't seen
   if(!$mySQL->numRows())
   {
      $mySQL->query("
         select * from place
         where
	    (select count(*) from vote where place=place.id) = 0 
            and id not in (select place from vote where uuid = '{$uuid}')
         order by rand
         limit 0,$limit
      ", DEBUG);
   } 

   //
   // And if that didn't work, just pick one at random -- or perhaps, since their votes wouldn't be
   // recorded, this should say "There are no more pictures"? Almost certainly moot -- terribly 
   // unlikely that anyone will ever get here.
   //
   if(!$mySQL->numRows())
   {
         $mySQL->query("select * from place order by rand limit 0,$limit", DEBUG);
   }      

   //
   // And if that didn't work, something broke.
   //
   if(!$mySQL->numRows())
   {
      throw new Exception("Unable to find a place");
   }
  
   $mySQL->seek(rand(0, $mySQL->numRows()-1));

   $place = $mySQL->fetchObject();
   
   if(DEBUG)
   {
      echo "Got: "; print_r($place);
      echo "</pre>";
   }
   
   return $place;
}

function local_image($image_uri)
{
   global $config;
   
   $img_path = str_replace('http://www.geograph.org.uk/geophotos', '', $image_uri);
   $img_dir = substr($img_path, 0, strrpos($img_path, '/'));
   
   if(!file_exists($config['site']['image_sysdir'] . $img_path))
   {
      if(!file_exists($config['site']['image_sysdir'] . $img_dir))
      {        
         if(!mkdir($config['site']['image_sysdir'] . $img_dir, 0777, true))
         {
            error_page('500 Internal Server Error', 'Unable to create image directory', 'Couldn\'t create a directory to cache this image. The server is probably misconfigured (is the directory writeable?)');
         }
      }
      
      if(!copy($image_uri, $config['site']['image_sysdir'] . $img_path))
      {
         return false;
#         error_page('500 Internal Server Error', 'Unable to retrieve image from Geograph', 'Either the image no longer exists at Geograph, or the server is misconfigured (is the directory writeable?)');
      }
   }
   
   return $config['site']['image_webdir'] . $img_path;
}

function image_dims($image_uri)
{
   global $config;
   
   $img_path = str_replace('http://www.geograph.org.uk/geophotos', '', $image_uri);
   $img_dir = substr($img_path, 0, strrpos($img_path, '/'));
   
   if(!file_exists($config['site']['image_sysdir'] . $img_path))
   {
      return 0;
   }
   
   $dims = getimagesize($config['site']['image_sysdir'] . $img_path);
   
   $image_width = $dims[0];
   $image_height = $dims[1];
   
   $factor = $image_width / 450;
   
   $image_width = 450;
   $image_height = round($image_height/$factor);
   
   return array($image_width, $image_height);
}

function make_auth($place, $token)
{
   global $config;
   
   return hash('ripemd160', $config['site']['secret'] . $place . $token);
}
?>
