<? head('', array('rankings.css')   ); ?>

<table id="summary">
<tr>
   <th>Total Places</th>
   <th>Total Votes</th>
   <th>Total Rated</th>
   <th>% Complete</th>
 <!--  <th>Distribution</th> -->
</tr>
<tr>
   <td>
      <p><?=number_format($stats['total_places']);?></p>
      <small>(<?=$stats['percentage_coverage'];?>% of Great Britain)</small>
   </td>
   <td>
      <p><?=number_format($stats['total_votes']);?></p>
      <small>(from approx <?=number_format($stats['total_users']);?> users)</small>
   </td>
   <td>
      <p><?=number_format($stats['total_rated']);?> done, <?=number_format($stats['partially_rated']);?> partial</p>
      <small>(<?=$stats['percentage_rated'];?>%, <?=$stats['percentage_partial'];?>%)</small>
   </td>
   <td>
      <img src="http://chart.apis.google.com/chart?chs=200x100&cht=gom&chd=t:<?=$stats['percentage_rated'];?>" alt="<?=$stats['percentage_rated'];?> percent complete" />
   </td>
   <!--<td>
      <a href="<?=$graph_uri;?>"><img src="<?=$graph_uri;?>" width="100" alt="Distribution Graph" /></a>
   </td>-->
</tr>
</table>


<table>
<tr>
   <th>Image</th>
   <th>Title</th>
   <th>Rating</th>
   <th>Votes</th>
   <th>Last Vote</th>
   <th>ID</th>
</tr>

<? foreach($places as $place): ?>
<tr>
   <td><a href="<?=local_image($place->image_uri);?>"?<img src="<?=local_image($place->image_uri);?>" width="100" alt="<?=$place->title;?>" /></a></td>
   <td><a href="http://www.google.co.uk/maps?z=9&amp;&t=h&amp;q=<?=urlencode("$place->lat, $place->lon ($place->title)");?>"><?=$place->title;?></a></td>
   <td><strong><?=$rankings[$place->id];?></strong></td>
   <td><?=$place->votes;?></td>
   <td><?=$votes[$place->id]->date_submitted;?></td>
   <td><?=$place->id;?></td>
<? endforeach; ?>
</table>

<? foot(); ?>
