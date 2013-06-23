<div id="blog">
  <div class="article">
    <h2><?php echo $mBlog->getTitle();?></h2>
    <?php echo $mBlog->getBody(true);?>
  </div>
  <div class="sidebar">
    <h2>Recent Post</h2>
    <ul>
        <?php 
          $counter = 0;
          foreach($list as $blog): 
          if($counter <= 5):
            ?>
          
          <li><a href="<?php echo site_url("blog/index/".$blog->id);?>"><?php echo $blog->title;?></a></li>
        <?php 
            endif;
            $counter++;
          endforeach; ?>
    </ul>
    <h2>Archive</h2>
    <ul>
        <?php 
          $counter = 5;
          foreach($list as $blog): 
          if($counter <= 0):
            ?>
          
          <li><a href="index.html"><?php echo $blog->title;?></a></li>
        <?php 
            endif;
            $counter--;
          endforeach; ?>
    </ul>
  </div>
</div>