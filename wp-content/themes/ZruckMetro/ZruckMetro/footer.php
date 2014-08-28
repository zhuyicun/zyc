<div class="clear"></div>

</div>
<!-- 页脚 -->
<?php wp_reset_query();if (is_single() || is_page() || is_archive() || is_search()) { ?>
<div class="footer_bottom_a">
	<div class="footer_body">
    <a class="footer_logo" href="<?php echo bloginfo('url'); ?>"></a>
	<div class="footer_content">
	<?php echo comicpress_copyright(); ?> <?php bloginfo('name'); ?>
	&nbsp;&nbsp;Theme by <script language="javascript">
var _$=["\x3c\x61\x20\x68\x72\x65\x66\x3d\"\x68\x74\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x6d\x6f\x62\x61\x6e\x62\x75\x73\x2e\x63\x6e\"\x20\x74\x61\x72\x67\x65\x74\x3d\"\x5f\x62\x6c\x61\x6e\x6b\"\x20\x74\x69\x74\x6c\x65\x3d\"\u6a21\u677f\u5df4\u58eb\"\x3e\u6a21\u677f\u5df4\u58eb\x3c\x2f\x61\x3e"];document.writeln(_$[0]);
</script>

	<?php echo stripslashes(get_option('swt_track_code')); ?>
	</div>
	</div>
</div>
<?php } ?>
<!-- 首页页脚 -->
<?php wp_reset_query();if ( is_home()){ ?>
<div class="footer_bottom">
	<div class="footer_body">
    <a class="footer_logo" href="<?php echo bloginfo('url'); ?>"></a>
	<div class="footer_content">
	<?php echo comicpress_copyright(); ?> <?php bloginfo('name'); ?>
	&nbsp;&nbsp;<script language="javascript">
document.writeln("\x3c\x61\x20\x68\x72\x65\x66\x3d\"\x68\x74\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x6d\x6f\x62\x61\x6e\x62\x75\x73\x2e\x63\x6e\"\x20\x74\x61\x72\x67\x65\x74\x3d\"\"\x3e\x3c\x62\x20\x73\x74\x79\x6c\x65\x3d\"\x63\x6f\x6c\x6f\x72\x3a\x23\x30\x30\x36\x36\x33\x33\"\x3e\u6b22\u8fce\u8bbf\u95ee\u6a21\u677f\u5df4\u58eb\x3c\x2f\x62\x3e\x3c\x2f\x61\x3e");
</script>

	<?php echo stripslashes(get_option('swt_track_code')); ?>
	</div>
	</div>
</div>
<?php } ?>
 <div class="clear"></div>
<?php wp_footer(); ?>
</body></html>
<?php if (get_option('swt_bulletin') == '关闭') { ?>
<?php { echo ''; } ?>
<?php } else { include(TEMPLATEPATH . '/includes/bulletin.php'); } ?>