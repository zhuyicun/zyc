<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/share_toolbar_fixed.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/share.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/like.css" />
<div id="share_toolbar_wrapper" style="position: static; top: auto; z-index: 9999;"> 
   <div id="share_toolbar"> 
    <div class="stb_group" id="stb_article_view" title="本文围观次数">
     <span id="stb_article_view_icon"></span>
     <span id="stb_view_count"><?php if(function_exists(the_views)) { the_views(); }?></span>
    </div> 
    <div class="stb_divide"></div> 
    <div data="{'url':'<?php the_permalink()?>'}" class="bdshare_t bds_tools get-codes-bdshare stb_share_buttons stb_group" id="bdshare"> 
     <a href="javascript:void(0);" id="stb_btn_weibo" class="bds_tsina" title="分享到新浪微博"></a> 
     <a href="javascript:void(0);" id="stb_btn_tqq" post_url="" class="bds_tqq" title="分享到腾讯微博"></a> 
     <a href="javascript:void(0);" id="stb_btn_qzone" class="bds_qzone" title="分享到QQ空间"></a> 
     <a href="javascript:void(0);" id="stb_btn_renren_small" class="bds_renren" title="分享到人人网"></a> 
     <span id="stb_btn_more" class="bds_more"><span id="stb_sbtn_more_icon"></span></span> 
     <a href="javascript:void(0);" class="shareCount">
		<!-- 百度分享代码 此处的uid=570158是我百度分享的id 请换成你自己的 -->
		<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=570158" ></script>
		<script type="text/javascript" id="bdshell_js"></script>
		<script type="text/javascript">
		document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
		</script>
	 </a> 
    </div> 
    <div class="stb_divide"></div>
    <div class="stb_share_buttons stb_group">
	<!-- 前一篇 -->
	<?php $next_post = get_next_post();
	if ($next_post){ ?>
	<a id="stb_btn_prev" href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo '上一篇: ' ?><?php echo get_the_title( $next_post->ID ); ?>"></a>
	<?php } else { ?>
	<a id="stb_btn_prev" href="" title="<?php echo '上一篇木有了，您可以看看别的文章' ?>"></a>
	<?php } ?>
	<!-- 下一篇 -->
	<?php $prev_post = get_previous_post();
	if ($prev_post){ ?>
	<a id="stb_btn_next" href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo '下一篇: ' ?><?php echo get_the_title( $prev_post->ID ); ?>"></a>
	<?php } else { ?>
	<a id="stb_btn_next" href="" title="<?php echo '下一篇木有了' ?>"></a>
	<?php } ?>
	</div> 
    <div class="stb_group_right"> 
     <div class="stb_like_btn" id="stb_like_gplus"> 
      <div data-href="<?php the_permalink() ?>" data-size="medium" class="g-plusone"></div> 
     </div> 
     <div class="bdlikebutton stb_like_btn bdlikebutton-blue bdlikebutton-small bdlikebutton-small-blue">
      <div class="bdlikebutton-inner">
       <span class="bdlikebutton-add">
			<!-- 显示百度like按钮 -->
			<div class="bdlikebutton"></div>
	   </span>
       <div class="bdlikebutton-count">
			<!-- 处理百度like按钮点击和like数量 -->
			<script id="bdlike_shell"></script>
			<script>
			var bdShare_config = {
				"type":"small",
				"color":"blue",
				"uid":"570158",
				"likeText":"喜欢",
				"likedText":"已赞过"
			};
			document.getElementById("bdlike_shell").src="http://bdimg.share.baidu.com/static/js/like_shell.js?t=" + new Date().getHours();
			</script>
       </div>
      </div>
     </div> 
    </div> 
   </div>
  </div>
  
<!-- 滚动后分享工具条改变CSS -->