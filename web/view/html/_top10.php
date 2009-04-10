<? head('', array('generic.css', 'top10.css')); ?>

<div id="side">
   <? header_box(); ?>
   </ul>
</div>

<div id="content">
   <div id="generic">
      <img src="assets/generic-top.jpg" alt="------------" />
      
      <h2>Leaderboard</h2>
      
      <p class="content">
         This page shows the current prettiest and ugliest places, according to your
         votes. It only uses the votes we've gathered so far, and that's only
         <?=$stats['percentage_rated'];?>% of the country &mdash; if you think that they're wrong, get voting!
      </p>
      
      <div id="top10">
         <img src="assets/top5.jpg" alt="Top 10 Most Scenic Places" />
         
         <? 
         foreach($top5 as $place):         
            display_place($place);
         endforeach; 
         ?>
      </div>
      <div id="bottom10">
         <img src="assets/bottom5.jpg" alt="Bottom 10 Least Scenic Places" />
         
         <? 
         foreach($bottom5 as $place):         
            display_place($place);
         endforeach; 
         ?>
      </div>
      
      <p class="clear content">
         If you want to hear news about ScenicOrNot and MySociety's other projects, 
         please <a href="https://secure.mysociety.org/admin/lists/mailman/listinfo/news">sign up for our email newsletter</a>.
      </p>
   </div>
   <img src="assets/generic-bottom.jpg" alt="------------" />
</div>

<? foot(); ?>
