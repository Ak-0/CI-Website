<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>  <!-- Primary Page Layout-->
<h5>Latest <?php echo $title; ?></h5>
<div class="columns">
<?php foreach ($news['rows'] as $news_item): ?>

        <div class="main">
		<b><?php echo $news_item['title']; ?></b><br>

                <?php echo $news_item['text']; ?>
 </div>
       <hr>
<?php endforeach; ?>
<center><?php echo $pages['pages'] ; ?></center><br>


</div>
<!-- End Document-->
