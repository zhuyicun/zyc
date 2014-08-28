<?php if (get_option('swt_cut_img') == '关闭') { ?>
<?php { echo ''; } ?>
<?php } else { 
add_image_size('thumbnail', 140, 100, true);
add_image_size('show', 400, 248, true);
add_image_size('hot', 236, 155, true);
 } ?>
<?php
include("includes/theme_options.php");
include("includes/functions/types.php");
include("includes/functions/types_gallery.php");
include("includes/functions/types_video.php");
include("includes/functions/inks_ico.php");
include("includes/functions/cumulus.php");
include("includes/functions/notify.php");
include("includes/functions/flip.php");
include("includes/functions/filing.php");
include("includes/widget.php");
include("includes/functions/banner.php");
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
		'name'			=> '首页小工具1',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '首页小工具2',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '全部页面小工具',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '其它页面小工具1',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '其它页面小工具2',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '相册、视频和公告模版小工具',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> 'RSS聚合',
        'before_widget'	=> '',
        'after_widget'	=> '',
        'before_title'	=> '<div class="r_box"><div class="rss"></div><h3>',
        'after_title'	=> '</h3>',
    	'after_widget' => '<i class="lt"></i><i class="rt"></i><i class="lb"></i><i class="rb"></i></div>',
    ));
}
//自定义菜单
   register_nav_menus(
      array(
         'header-menu' => __( '导航自定义菜单' ),
         'footer-menu' => __( '页角自定义菜单' )
      )
   );

//背景
add_custom_background();

//后台预览
add_editor_style('/css/editor-style.css');

//支持外链缩略图
if ( function_exists('add_theme_support') )
 add_theme_support('post-thumbnails');
 /*Catch first image (post-thumbnail fallback) */
 function catch_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
		$random = mt_rand(1, 20);
		echo get_bloginfo ( 'stylesheet_directory' );
		echo '/images/random/'.$random.'.jpg';
  }
  return $first_img;
 }
 
//标题文字截断
function cut_str($src_str,$cut_length)
{
    $return_str='';
    $i=0;
    $n=0;
    $str_length=strlen($src_str);
    while (($n<$cut_length) && ($i<=$str_length))
    {
        $tmp_str=substr($src_str,$i,1);
        $ascnum=ord($tmp_str);
        if ($ascnum>=224)
        {
            $return_str=$return_str.substr($src_str,$i,3);
            $i=$i+3;
            $n=$n+2;
        }
        elseif ($ascnum>=192)
        {
            $return_str=$return_str.substr($src_str,$i,2);
            $i=$i+2;
            $n=$n+2;
        }
        elseif ($ascnum>=65 && $ascnum<=90)
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+2;
        }
        else 
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+1;
        }
    }
    if ($i<$str_length)
    {
        $return_str = $return_str . '';
    }
    if (get_post_status() == 'private')
    {
        $return_str = $return_str . '（private）';
    }
    return $return_str;
}

//禁止代码标点转换
remove_filter('the_content', 'wptexturize');
//编辑器增强
 function enable_more_buttons($buttons) {
     $buttons[] = 'hr';
     $buttons[] = 'del';
     $buttons[] = 'sub';
     $buttons[] = 'sup'; 
     $buttons[] = 'fontselect';
     $buttons[] = 'fontsizeselect';
     $buttons[] = 'cleanup';   
     $buttons[] = 'styleselect';
     $buttons[] = 'wp_page';
     $buttons[] = 'anchor';
     $buttons[] = 'backcolor';
     return $buttons;
     }
add_filter("mce_buttons_3", "enable_more_buttons");

//分类文章数
function wt_get_category_count($input = '') {
    global $wpdb;

    if($input == '') {
        $category = get_the_category();
        return $category[0]->category_count;
    }
    elseif(is_numeric($input)) {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
        return $wpdb->get_var($SQL);
    }
    else {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
        return $wpdb->get_var($SQL);
    }
}
//自定义头像
add_filter( 'avatar_defaults', 'fb_addgravatar' );
function fb_addgravatar( $avatar_defaults ) {
$myavatar = get_bloginfo('template_directory') . '/images/gravatar.png';
  $avatar_defaults[$myavatar] = '自定义头像';
  return $avatar_defaults;
}

// 判断管理员
function is_admin_comment ($comment_ID=0) {
$user_id = get_comment($comment_ID)->user_id;
$user_info = get_userdata($user_id);
return $user_info->user_level == 10;
return $admin_comment;
}

// 评论回复
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) {
		$page = get_query_var('cpage')-1;
		$cpp=get_option('comments_per_page');
		$commentcount = $cpp * $page;
	}
    ?>
   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
   <div id="div-comment-<?php comment_ID() ?>">
      <?php $add_below = 'div-comment'; ?>
		<div class="author_box">
			<div class="t" style="display:none;" id="comment-<?php comment_ID(); ?>"></div>
			<span id="avatar">
				<?php if (is_admin_comment($comment->comment_ID)){ ?>
      			 <?php echo get_avatar( $comment, 32 ); ?><br/><span class="admin_w">管理员</span>
				<?php } else { echo get_avatar( $comment, 48 ); } ?>
			</span>
			<span  class="comment-author">
				<span><?php comment_author_link(); ?></span> 说：

				<span class="reply">
					<?php comment_reply_link(array_merge( $args, array('reply_text' => '回复ta', 'add_below' =>$add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
					
					<span class="datetime">
					写于<?php comment_date('m月d日 ') ?><?php comment_time('H:i') ?><?php edit_comment_link('编辑','+',''); ?>
					<?php
					if ( is_user_logged_in() ) {
					$url = get_bloginfo('url');
					echo '<a id="delete-'. $comment->comment_ID .'" href="' . wp_nonce_url("$url/wp-admin/comment.php?action=deletecomment&amp;p=" . $comment->comment_post_ID . '&amp;c=' . $comment->comment_ID, 'delete-comment_' . $comment->comment_ID) . '"" >×删除</a>';
					}
					?>
					</span>
				</span>
			</span >
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
		您的评论正在等待审核中...
		<br/>
		<?php endif; ?>
		<span class="comment_text"><?php comment_text() ?></span>
		<div class="clear"></div>
  </div>
<?php
}

function mytheme_end_comment() {
		echo '</li>';
}

//自动生成版权时间
function comicpress_copyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
    $output = '';
    if($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
    $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
    }
    return $output;
    }

//密码保护提示
function password_hint( $c ){
global $post, $user_ID, $user_identity;
if ( empty($post->post_password) )
return $c;
if ( isset($_COOKIE['wp-postpass_'.COOKIEHASH]) && stripslashes($_COOKIE['wp-postpass_'.COOKIEHASH]) == $post->post_password )
return $c;
if($hint = get_post_meta($post->ID, 'password_hint', true)){
$url = get_option('siteurl').'/wp-pass.php';
if($hint)
$hint = '密码提示：'.$hint;
else
$hint = "请输入您的密码";
if($user_ID)
$hint .= sprintf('欢迎进入，您的密码是：', $user_identity, $post->post_password);
$out = <<<END
<form method="post" action="$url">
<p>这篇文章是受保护的文章，请输入密码继续阅读:</p>
<div>
<label>$hint<br/>
<input type="password" name="post_password"/></label>
<input type="submit" value="Submit" name="Submit"/>
</div>
</form>
END;
return $out;
}else{
return $c;
}
}
add_filter('the_content', 'password_hint');

//评论贴图
function embed_images($content) {
  $content = preg_replace('/\[img=?\]*(.*?)(\[\/img)?\]/e', '"<img src=\"$1\" alt=\"" . basename("$1") . "\" />"', $content);
  return $content;
}
add_filter('comment_text', 'embed_images');

//留言信息
function WelcomeCommentAuthorBack($email = ''){
	if(empty($email)){
		return;
	}
	global $wpdb;

	$past_30days = gmdate('Y-m-d H:i:s',((time()-(24*60*60*30))+(get_option('gmt_offset')*3600)));
	$sql = "SELECT count(comment_author_email) AS times FROM $wpdb->comments
					WHERE comment_approved = '1'
					AND comment_author_email = '$email'
					AND comment_date >= '$past_30days'";
	$times = $wpdb->get_results($sql);
	$times = ($times[0]->times) ? $times[0]->times : 0;
	$message = $times ? sprintf(__('过去30天内您有<strong>%1$s</strong>条留言，感谢关注!' ), $times) : '您已很久都没有留言了，这次想说点什么？';

	return $message;
}

//字数统计
function count_words ($text) {
global $post;
if ( '' == $text ) {
   $text = $post->post_content;
   if (mb_strlen($output, 'UTF-8') < mb_strlen($text, 'UTF-8')) $output .= '共 ' . mb_strlen(preg_replace('/\s/','',html_entity_decode(strip_tags($post->post_content))),'UTF-8') . '字';
   return $output;
}
}

//去掉描述P标签
function deletehtml($description) {
$description = trim($description);
$description = strip_tags($description,"");
return ($description);
}
add_filter('category_description', 'deletehtml');

//屏蔽默认小工具
add_action( 'widgets_init', 'my_unregister_widgets' );
function my_unregister_widgets() {
//近期评论
	unregister_widget( 'WP_Widget_Recent_Comments' );
//近期文章
	unregister_widget( 'WP_Widget_Recent_Posts' );
//搜索
	unregister_widget( 'WP_Widget_Search' );
}

/**以下是shortcode**/
//下载按钮
function button_a($atts, $content = null) {
extract(shortcode_atts(array(
"href" => 'http://'
), $atts));
return '<div id="download"><a href="'.$href.'" target="_black">'.$content.'</a><span></span></div>';
}
add_shortcode("url", "button_a");
//演示按钮
function button_b($atts, $content = null) {
extract(shortcode_atts(array("href" => 'http://'), $atts));
return '<div id="demo"><a href="'.$href.'" target="_black">'.$content.'</a><span></span></div>';
}
add_shortcode("demo", "button_b");
//传送门按钮
function button_gate($atts, $content = null) {
extract(shortcode_atts(array("href" => 'http://'), $atts));
return '<div id="urlgate"><a href="'.$href.'" target="_black">'.$content.'</a><span></span></div>';
}
add_shortcode("urlgate", "button_gate");
//h3文章中标题样式
function h3_sty($atts, $content=null){   
    return '<h3 style="background: #F1F7FD;
border: 1px solid #D2E8FA;
line-height:24px;
color: #666;
padding: 5px 5px 5px 10px;
margin: 20px 0;
font-weight: bold;
font-size: 15px;">'.$content.'</h3>';   
}   
add_shortcode('h3','h3_sty');

//youku去广告短代码
function youku_video($atts, $content=null){   
    return '<p style="text-align: center;"><embed src=http://static.youku.com/v1.0.0149/v/swf/qplayer_rtmp.swf?VideoIDS='.$content.'ID&winType=adshow&isAutoPlay=true" quality="high" width="610" height="460" align="middle" wmode="transparent" allowScriptAccess="never" allowNetworking="internal" autostart="0" type="application/x-shockwave-flash"></embed></p>';   
}   
add_shortcode('youku','youku_video');

//mp3播放器短代码
function mp3player($atts, $content=null){
extract(shortcode_atts(array("auto"=>'0'),$atts));
return '<embed src="'.get_bloginfo("template_url").'/mp3player.swf?url='.$content.'&amp;autoplay='.$auto.'" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" width="400" height="30">';
}
add_shortcode('mp3','mp3player');

//插入视频网站的flash
function swfplayer($atts, $content=null){
return '<p align="center"><embed wmode="transparent" width="550" height="459" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" src="'.$content.'" allowfullscreen="true" quality="high" flashvars="isShowRelatedVideo=false&amp;showAd=0&amp;show_pre=1&amp;show_next=1&amp;isAutoPlay=false&amp;isDebug=false&amp;UserID=&amp;winType=interior&amp;playMovie=true&amp;MMControl=false&amp;MMout=false&amp;RecordCode=1001,1002,1003,1004,1005,1006,2001,3001,3002,3003,3004,3005,3007,3008,9999" play="true" loop="true" menu="true"></p>';
}
add_shortcode('swf','swfplayer');
//全部结束
?>