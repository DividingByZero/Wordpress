<?php /* 
This is the correct way to do a blog aggregator.  There is no need to initialize word press's framework, embed a bunch of code, etc.  Just point it to the right RSS and you can aggregate any blog easily.
*/ ?>

<div class="content">
    <?php
	$url = "http://".$_SERVER['HTTP_HOST']."/?feed=rss2";
	$rss = simplexml_load_file($url);
	$count = 0;
	$posts = 2;
       $characters = 100;
	?>
    <?php if(!$rss) : ?>
		<h4>Blog currently unavailable</h4>
    <?php else : ?>
		<?php foreach ($rss->channel->item as $item) : ?>
			<?php if($count < $posts): ?>
				<h4><?php echo $item->title; ?></h4>
				<p><?php echo substr(strip_tags($item->description),0,$characters); ?>...</p>
				<p><a href="<?php echo $item->link; ?>">learn more</a></p>
			<?php $count++; endif; ?>
		<?php endforeach; ?>
    <?php endif; ?>
</div>
