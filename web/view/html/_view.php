<? head('', array('home.css'), array('prototype-1.6.js', '_home.js')); ?>

<div id="side">
   <? header_box(); ?>
   
   <li id="rated_place_wrap">
      <div id="rated_place">
         <img src="assets/rated-board-top.jpg" alt="-----------" />
         
         <div id="rating">
            <strong><?=$place['title'];?></strong>
            (<a target="_new" href="http://www.google.co.uk/maps?z=13&amp;q=<?=$place['geograph_uri'];?>.kml">map</a>)
            <p>
            <? if($place['votes']): ?>
               Rating: <strong><?=$place['score'];?></strong> <small>(from <?=$place['votes'];?> vote<?=($place['votes'] == 1 ? '' : 's');?>)</small>
            <? else: ?>
               This place hasn't been voted on yet.
            <? endif; ?>
            </p>
         </div>
      </div>
      <img src="assets/rated-board-bottom.jpg" alt="------------" />
   </li>
   </ul>
</div>

<div id="content">
   <div id="place">      
      <div id="frame" style="width: <?=($image_width+44);?>px;">
         <div id="top"><img src="assets/pictureframe-top.jpg" class="left" alt="Please rate the scenicness of the place, not the skill of the photographer -- thanks!" /><img src="assets/pictureframe-tr.jpg" class="right" alt="tr" /></div>
         <div id="left" style="height: <?=($image_height);?>px;"></div>
         <div id="right" style="height: <?=($image_height);?>px;"></div>
         <img id="picture" src="<?=$place['image_link'];?>" alt="<?=$place['title'];?>" />
         <div id="bottom"><img src="assets/pictureframe-bl.jpg" class="left" alt="tl" /><img src="assets/pictureframe-br.jpg" class="right" alt="tr" /></div>
      </div>
   </div>
   
  <div id="license"><a href="<?=$place['geograph_uri'];?>">Photo</a> by <a href="<?=$place['creator_uri'];?>"><?=$place['creator'];?></a> (<a href="<?=$place['license_uri'];?>">License</a>)</div>
</div>
<? foot(); ?>
