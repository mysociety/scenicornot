<? head("$title - ", array('generic.css')); ?>

<div id="side">
   <? header_box(); ?>
   </ul>
</div>

<div id="content">
   <div id="generic">
      <img src="assets/generic-top.jpg" alt="------------" />
      
      <h2><?=$title;?></h3>
      <h3 class="content"><?=$heading;?></h3>
      <p class="content"><?=$error;?></p>
   </div>
   <img src="assets/generic-bottom.jpg" alt="------------" />
</div>


<? foot(); ?>
