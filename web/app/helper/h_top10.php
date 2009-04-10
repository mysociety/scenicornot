<?php

function display_place($place)
{
   ?>
   <div class="place">
      <div class="rating_num"><img src="assets/rank_number_1.png" /></div>
      <a href="view-<?=$place['id'];?>-<?=preg_replace('/\W+/', '-', $place['title']);?>"<img src="<?=$place['image_link'];?>" alt="<?=$place['title'];?>" alt="<?=$place['title'];?>" /></a>
      <div class="place_text">
         <strong><?=$place['title'];?></strong> 
         (<a target="_new" href="http://www.google.co.uk/maps?z=13&amp;q=<?=$place['geograph_uri'];?>.kml">map</a>)
         <p>
            Rating: <strong><?=$place['score'];?></strong> <small>(from <?=$place['votes'];?> vote<?=($place['votes'] == 1 ? '' : 's');?>)</small>
         </p>
      </div>
      
      
   </div>
   <?
}

?>
