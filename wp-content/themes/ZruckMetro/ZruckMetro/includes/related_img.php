<div class="related_img_list">
	<?php
	query_posts(array('orderby' => 'rand', 'showposts' => 4, 'caller_get_posts' => 4));
	if (have_posts()) :
	while (have_posts()) : the_post();?>
	<div class="related_img">
	<div class="related_img_box">
		<?php include('thumbnail.php'); ?>
	</div>
	<span class="related_img_title">
		<?php the_title();?>
	</span>
	</div>
	<?php endwhile;endif; ?>
	<?php wp_reset_query();?>
</div>