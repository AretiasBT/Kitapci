<div class="clearfix"></div>
<div class="footer">
	<div class="footer-side">
		<div class="footer-sidebar"><?php dynamic_sidebar('footer-one'); ?></div>
		<div class="footer-sidebar"><?php dynamic_sidebar('footer-two'); ?></div>
		<div class="footer-sidebar"><?php dynamic_sidebar('footer-three'); ?></div>
		<div class="footer-sidebar"><?php dynamic_sidebar('footer-four'); ?></div>
	</div>
	<?php if(get_theme_mod('copyright_display') == 'Yes'){ ?>
	<div class="copyright"><a href="<?php echo get_theme_mod('copyright_adresi') ?>" target="_blank"><img src="<?php echo wp_get_attachment_url(get_theme_mod('copyright_gorseli')) ?>" alt="Copyright Logo"><br><?php echo get_theme_mod('copyright_metni') ?></a><br><?php echo get_theme_mod('copyright_diger') ?></div>
	<?php } ?>
</div>
<?php wp_footer() ?>
</body>
</html>