<?php get_header(); ?>
<div id="post">
	<!-- menu -->
	<div id="map">
		<div class="browse">现在位置： <a title="返回首页" href="<?php echo get_settings('Home'); ?>/">首页</a></div>
		<div id="feed"><a href="<?php bloginfo('rss2_url'); ?>" title="RSS">RSS</a></div>
	</div>
	<!-- end: menu -->
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="entry_box">
				<div class="box_entry">

					<div class="new"><?php include('includes/new.php'); ?></div>
					<?php if (is_sticky()) {echo '<div class="sticky-post"></div>';} ?>
					<div class="clear"></div>
					<!-- thumbnail -->
					<div class="thumbnail_box">
						<?php include('includes/thumbnail.php'); ?>
					</div>
					<div class="box_entry_title">
						<div class="ico"><?php if (get_option('swt_ico') == '显示') { ?><?php include('includes/cat_ico.php'); ?><?php } else { } ?></div>
						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<div class="info">
							<span class="date"><?php the_time('m-d') ?></span>
							<span class="category"><?php the_category(', ') ?></span>
							<span class="comment"><?php comments_popup_link('暂无评论', '评论数 1', '评论数 %'); ?></span>	
							<span class="views"><?php if(function_exists('the_views')) { print '被围观 '; the_views(); print '+';  } ?></span>
							<span class="posttag"><?php the_tags('', ', ', ''); ?></span>
							<span class="edit"><?php edit_post_link('&nbsp;&nbsp;&nbsp;', '  ', '  '); ?></span>
						</div>
					</div>
					<div class="post_entry">
						<?php if (has_excerpt())
						{ ?> 
							<?php the_excerpt() ?>
						<?php
						}
						else{
							echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 230,"...");
						} 
						?>
						<div class="clear"></div>
						<span class="archive_more"><a href="<?php the_permalink() ?>" title="详细阅读 <?php the_title(); ?>" rel="bookmark" class="title"><span class="archive_more_ico"></span></a></span>
						<div class="clear"></div>
					</div>
				</div>

			</div>	

		<!-- end: entry_box -->
		</div>
		<!-- ad -->
		<?php if ($wp_query->current_post == 2) : ?>
		<?php if (get_option('swt_adh') == '关闭') { ?>
		<?php { echo ''; } ?>
		<?php } else { include(TEMPLATEPATH . '/includes/ad_h.php'); } ?>
		<?php endif; ?>	
		<!-- end: ad -->
		<?php endwhile; ?>
		<?php endif; ?>
	<div class="navigation"><?php pagination($query_string); ?></div>
	<div class="clear"></div>
</div>
<!-- end: post -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
