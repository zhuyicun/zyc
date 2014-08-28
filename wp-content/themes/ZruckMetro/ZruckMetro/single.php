<?php get_header(); ?>
<?php include('includes/addclass.php'); ?>
<script type="text/javascript">
    function doZoom(size) {
        var zoom = document.all ? document.all['entry'] : document.getElementById('entry');
        zoom.style.fontSize = size + 'px';
    }
</script>
<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	 <!-- menu -->
		<div id="map">
			<div class="browse">现在的位置: <a title="返回首页" href="<?php echo get_settings('Home'); ?>/">首页</a> &gt; <?php $categories = get_the_category(); echo(get_category_parents($categories[0]->term_id, TRUE, ' &gt; '));  ?>正文</div>
			<div id="feed"><a href="<?php bloginfo('rss2_url'); ?>" title="RSS">RSS</a></div>
			<div class="font">
				<a href="javascript:doZoom(15)">A<sup class="aa">-</sup></a>
				<a href="javascript:doZoom(17)">A<sup class="aa">+</sup></a>
			</div>
		</div>
		<!-- end: menu -->
		<div class="entry_box_s">
			<div class="entry_title_box">
				<!-- 分类图标 -->
				<div class="ico"><?php if (get_option('swt_ico') == '显示') { ?><?php include('includes/cat_ico.php'); ?><?php } else { } ?></div>
				<!-- end: 分类图标 -->
				<div class="entry_title"><?php the_title(); ?></div>
				<div class="entry_info">
					<span class="category"><?php the_category(', ') ?></span>
					<span class="comment"><?php comments_popup_link('暂无评论', '评论数 1', '评论数 %'); ?></span>					
					<span class="views"><?php if(function_exists('the_views')) { print '被围观 '; the_views(); print '+';  } ?></span>
					<?php include('includes/source.php'); ?>
					<span class="edit"><?php edit_post_link('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '  ', '  '); ?></span>
				</div>
				<div class="post_date_block">
					<div class="post_date">
					<span class="post_day"><?php the_time('jS') ?></span>
					<span class="post_month"><?php the_time('M') ?>月</span>
					</div>
                </div>
			</div>
			<!-- end: entry_title_box -->
			<?php include("share.php"); ?>
			<div class="entry">
				<div id="entry">
					<?php if (get_option('swt_ad_r') == '关闭') { ?>
					<?php { echo ''; } ?>
					<?php } else { include(TEMPLATEPATH . '/includes/ad_r.php'); } ?>
					<?php the_content('Read more...'); ?>
					<?php wp_link_pages( array( 'before' => '<p class="pages">' . __( '日志分页:'), 'after' => '</p>' ) ); ?>
					<div class="clear"></div>
				</div>
			</div>
			<div class="content_tag">
			标签: <?php the_tags('', ', ', ''); ?>
			</div>
			<div id="entry_bottom" class="clear"></div>
			<!-- end: entry -->

		</div>
		<div class="section_title">
			<span>关于本文</span>
		</div>
		<!-- entrymeta -->
		<div class="entrymeta">
			<div class="authorbio">
				<div class="author_pic">
					<?php echo get_avatar( get_the_author_email(), '48' ); ?>
				</div>
				<div class="clear"></div>
				<div class="author_text">
					<h4>作者: <span><?php the_author_posts_link('namefl'); ?></span></h4>
				</div>
			</div>
			<span class="spostinfo">
				<ul>
					<li class="category_li">所属分类：<?php the_category(', ') ?>
						<div class="context">
							<div class="context_t">
								<span class="context_pr">
									<?php previous_post_link('%link', '<上一篇', TRUE); ?>
									<span class="context_pr_tip">
										<?php previous_post_link('%link'); ?>
									</span>
								</span>

								<span class="context_ne">
									<?php next_post_link('%link', '下一篇>', TRUE); ?>
									<span class="context_ne_tip">
										<?php next_post_link('%link'); ?>
									</span>
								</span>
							</div>
						</div>
					</li>
					<li>文章编辑：<?php the_author() ?></li>
					<li>发表日期：<?php the_time('Y年m月d日') ?></li>
					<li>转载注明: <a href="<?php the_permalink() ?>" rel="bookmark" title="本文固定链接 <?php the_permalink() ?>"><?php the_title(); ?> | <?php bloginfo('name');?></a><a href="#" onclick="copy_code('<?php the_permalink() ?>'); return false;"> +复制链接</a></li>
				</ul>
			</span>

			<div class="clear"></div>
		</div>
		<!-- end: entrymeta -->
		<!-- ad -->
		<?php if (get_option('swt_adt') == '关闭') { ?>
		<?php { echo ''; } ?>
		<?php } else { include(TEMPLATEPATH . '/includes/adt.php'); } ?>

	<!-- relatedposts -->
	<div class="section_title">
			<span>相关文章</span>
	</div>
	<?php if (get_option('swt_related') == '关闭') { ?>
	<?php { echo ''; } ?>
	<?php } else { include(TEMPLATEPATH . '/includes/related_a.php'); } ?>
	<!-- end: relatedposts -->
	<div class="ct"></div>
	<?php comments_template(); ?>
	<?php endwhile; else: ?>
	<?php endif; ?>
</div>
<!-- end: content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>