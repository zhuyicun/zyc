<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">必须输入密码，才能查看评论！</p>
			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = '';
?>
<!-- You can start editing here. -->
<?php if ($comments) : ?>
<!-- 引用 -->	
<?php
  /* Count the totals */
  $numPingBacks = 0;
  $numComments  = 0;

  /* Loop throught comments to count these totals */
  foreach ($comments as $comment)
    if (get_comment_type() != "comment") $numPingBacks++; else $numComments++;
?>
		<div id="comments" class="section_title">
			<span>各抒己见</span>
		</div>
	
	<ol class="commentlist"><?php wp_list_comments('type=comment&callback=mytheme_comment&end-callback=mytheme_end_comment'); ?></ol><!--调用function.php 中第248行开始-->
<!-- 引用 -->
<?php if($numPingBacks>0) { ?>
	<div class="trackbacks">
		<h4 class="backs">查看来自外部的引用:<?php echo ' '.$numPingBacks.'';?></h4>
		<div class="track">
			<ul >
				<?php foreach ($comments as $comment) : ?>
				<?php $comment_type = get_comment_type(); ?>
				<?php if($comment_type != 'comment') { ?>
				<li><?php comment_author_link() ?></li>
				<?php } ?>
				<?php endforeach; ?>
 			</ul>
		</div>
	</div>
<?php } ?>
	<div class="navigation_c">
		<div class="previous"><?php paginate_comments_links(); ?></div>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">抱歉!评论已关闭.</p>
	<?php endif; ?>
	<?php endif; ?>
	<?php if (get_option('swt_adc') == '关闭') { ?>
	<?php { echo ''; } ?>
	<?php } else { include(TEMPLATEPATH . '/includes/ad_c.php'); } ?>
	<?php if ('open' == $post->comment_status) : ?>
	<div id="respond_box">
	<div id="respond">
		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php print '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
		<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( $user_ID ) : ?>
		<p><div class="user_avatar"><?php echo get_avatar( get_the_author_email(), '32' ); ?></div><?php print '登录者：'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a><br/>
			<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php print '[ 退出登录 ]'; ?></a>
			<?php elseif ( '' != $comment_author ): ?>
			<div class="author_avatar">			
				<?php echo get_avatar($comment_author_email, $size = '32');  ?>
			</div>
			<div class="author">
				<?php printf(__('欢迎 <strong>%s</strong>'), $comment_author); ?> 再次光临
				<?php echo WelcomeCommentAuthorBack($comment_author_email); ?>
			</div>
		</p>
	<?php endif; ?>
	<?php if ( ! $user_ID ): ?>
	<div id="comment-author-info">
		<p>
			<input type="text" name="author" id="author" class="commenttext" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
			<label for="author">昵称<?php if ($req) echo " *"; ?></label>
		</p>
		<p>
			<input type="text" name="email" id="email" class="commenttext" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
			<label for="email">邮箱<?php if ($req) echo " *"; ?></label>
		</p>
		<p>
			<input type="text" name="url" id="url" class="commenttext" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
			<label for="url">网址</label>
		</p>
	</div>
      <?php endif; ?>

		<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
		<p><textarea name="comment" id="comment" tabindex="4"></textarea></p>
		<p>
			<?php if (get_option('swt_smiley') == '关闭') { ?>
			<?php { echo ''; } ?>
			<?php } else { include(TEMPLATEPATH . '/includes/smiley.php'); } ?>
		</p>
		<div class="submitted">
			<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="提交留言"/>
			<input class="reset" name="reset" type="reset" id="reset" tabindex="6" value="<?php esc_attr_e( '重写' ); ?>" />
			<?php comment_id_fields(); ?>
		</div>
		<script type="text/javascript">	//Ctrl+Enter
			$(document).keypress(function(e){
				if(e.ctrlKey && e.which == 13 || e.which == 10) { 
					$(".submit").click();
					document.body.focus();
				} else if (e.shiftKey && e.which==13 || e.which == 10) {
					$(".submit").click();
				}
			})
		</script>
		<?php do_action('comment_form', $post->ID); ?>
    </form>

	<div class="clear"></div>
    <?php endif; // If registration required and not logged in ?>
  </div>

  </div>

 <?php endif; // if you delete this the sky will fall on your head ?>