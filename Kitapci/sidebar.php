<?php if(get_theme_mod('sosyal_medya') == 'Yes'){ ?>
<div class="sidebar-body">
	<div class="social-media">
		<?php if(!empty(get_theme_mod('facebook_url'))){ ?><a href="<?php echo get_theme_mod('facebook_url') ?>" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a> <?php } ?>
		<?php if(!empty(get_theme_mod('twitter_url'))){ ?><a href="<?php echo get_theme_mod('twitter_url') ?>" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a> <?php } ?>
		<?php if(!empty(get_theme_mod('instagram_url'))){ ?><a href="<?php echo get_theme_mod('instagram_url') ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a> <?php } ?>
		<?php if(!empty(get_theme_mod('youtube_url'))){ ?><a href="<?php echo get_theme_mod('youtube_url') ?>" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a> <?php } ?>
		<?php if(!empty(get_theme_mod('github_url'))){ ?><a href="<?php echo get_theme_mod('github_url') ?>" target="_blank" title="Github"><i class="fab fa-github"></i></a> <?php } ?>
		<?php if(get_theme_mod('tel_no_options') == '2' || get_theme_mod('tel_no_options') == '3'){ ?><a href="https://wa.me/90<?php echo get_theme_mod('tel_no') ?>" target="_blank" title="Whatsapp"><i class="fab fa-whatsapp"></i></a> <?php } ?>
		<?php if(get_theme_mod('tel_no_options') == '1' || get_theme_mod('tel_no_options') == '3'){ ?><a href="tel:+90<?php echo get_theme_mod('tel_no') ?>" title="Telefon"><i class="fas fa-phone-square-alt"></i></a> <?php } ?>
		<?php if(!empty(get_theme_mod('mail_adresi'))){ ?><a href="mailto:<?php echo get_theme_mod('mail_adresi') ?>" title="Mail"><i class="fas fa-envelope"></i></a> <?php } ?>
	</div>
</div>
<?php } ?>
<?php dynamic_sidebar('sidebar-right'); ?> 