<?php


function head($title, $styles = array(), $javascripts = array(), $head_tags = array())
{  
   header("Content-type: text/html; charset=utf-8");
   
   ?>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
   <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      
      <?
      
      foreach($head_tags as $head_tag)
      {
        echo "   $head_tag\n";
      }
      
      ?>
   
      <title><?=$title;?>ScenicOrNot</title>
     
      <?
      
      foreach($javascripts as $script)
      {
        ?><script type="text/javascript" src="js/<?=$script;?>"></script>
        <?
      }
      
      
      ?> 
      <link href="css/common.css" rel="stylesheet" type="text/css" />
      <?
      
      foreach($styles as $sheet)
      {
        ?><link href="css/<?=$sheet;?>" rel="stylesheet" type="text/css" />
        <?
      }
   
      ?>  
   </head>
   
   <body>
   <div id="beta_message_wrap">
      <div id="beta_message">
            <h3>ScenicOrNot is in beta</h3>
            We're still testing the site, but we think it's already fun so we wanted to get it out there.<br />
            There's lots of stuff that we'd like to fix, including some really horrible CSS.  
            In the meantime, if you find bugs or you have any feedback, please <a href="contact@thedextrousweb.com">email us</a>.   
      </div>
   </div>
   
   <div id="page_wrap">
   
   
   <div id="page">
   <?
}


function foot()
{
   ?>
   
      </div>
      <div class="clear"></div>
      
   </div>
     
   <div id="footer_wrapper">
      <div id="footer">
         <p>A mini project built for <a href="http://www.mysociety.org">MySociety</a>. <a href="mailto:team@mysociety.org">Contact us</a></p>
      </div>
   </div>
   
   </body>
   </html>
   <?
}

function header_box()
{
   ?>
   
   <ul>
      <li id="menu_logo"><a href="/scenic"><img src="assets/scenicornot.jpg" alt="Scenic Or Not" /></a></li>
      
      <li id="menu_home" class="menu"><a href="/scenic">Home</a></li>
      <li id="menu_faq" class="menu"><a href="/scenic/faq">FAQ</a></li>
      <li id="menu_top10" class="menu"><a href="/scenic/leaderboard">Leaderboard</a></li>

   <?
}

?>
