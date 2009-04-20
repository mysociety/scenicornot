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
      <p class="content">If this was unexpected and you haven't found a solution, please <a href="mailto:team@mysociety.org">let us know</a>.</p>
   </div>
   <img src="assets/generic-bottom.jpg" alt="------------" />
</div>


<? foot(); ?>
