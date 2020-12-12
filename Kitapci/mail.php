<?php

/*
*
*	Template Name: İletişim
*
*/
get_header(); 

$editor_settings = array(
	'textarea_name'	=> 'mail[message]',
	'media_buttons'	=> false,
	'textarea_rows'	=> 10,
	'tabindex'		=> 4,
	'teeny'			=> true
);

?>
	<div class="container">
		<div class="wrapper">
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<h1 class="bolum-baslik"><?php single_post_title() ?></h1>
			<div class="article">
				<div class="bolum-m">
					<form action="" method="POST">
						<div class="form-grup">
							<div class="form-element-l">
								<label class="label-l" for="name">İsim</label>
								<input type="text" class="form-input" name="mail[name]" id="name" value="" tabindex="1" placeholder="İsim" />
							</div>
							<div class="form-element-l">
								<label class="label-l" for="email">Eposta</label>
								<input type="email" class="form-input" name="mail[email]" id="email" value="" tabindex="2" placeholder="isim@gmail.com" />
							</div>
							<div class="form-element-l">
								<label class="label-l" for="subject">Konu</label>
								<input type="text" class="form-input" name="mail[subject]" id="subject" value="" tabindex="3" placeholder="Konu" />
							</div>
							<div class="form-element-l">
								<label class="label-l" for="message">Mesaj</label><br>
								<?php wp_editor( 'Mesajınızı buraya giriniz', 'message', $editor_settings) ?>
							</div>
							<div class="form-element-l">
								<label class="label-l"></label>
								<input type="submit" class="form-input" name="submit" id="submit" value="GÖNDER" tabindex="5"/>
							</div>
						</div>
						
					</form>
					<?php
						if(isset($_POST['submit'])){
							$mesaj = $_POST['mail'];
							$konu = $mesaj['subject'].' | '.get_option('blogname');
							$mesajBody = '<b>Kimden</b>: '.$mesaj['name'].' &lt;'.$mesaj['email'].'&gt;<br>';
							$mesajBody = $mesajBody.'<b>Konu</b>: '.$mesaj['subject'].'<br>';
							$mesajBody = $mesajBody.'<b>İleti Gövdesi</b>:<br>';
							$mesajBody = $mesajBody.$mesaj['message'];
							$headers = array('Reply-To: '.$mesaj['email'],); 
							try{
								wp_mail(get_option('admin_email'), $konu, $mesajBody, $headers);
								echo 'Mesajınız başarıyla gönderildi. Eğer gerekliyse size en kısa zamanda geri döneceğiz.';
							} catch (Exception $e) {
								echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
							}
						} 
					?>
				</div>
				<div class="bolum-m">
					<div class="iletisim-social">
						<?php if(!empty(get_theme_mod('facebook_url'))){ ?><a href="<?php echo get_theme_mod('facebook_url') ?>" target="_blank" title="Facebook"><p><i class="fab fa-facebook"></i><span>Facebook Hesabımız</span></p></a> <?php } ?>
						<?php if(!empty(get_theme_mod('twitter_url'))){ ?><a href="<?php echo get_theme_mod('twitter_url') ?>" target="_blank" title="Twitter"><p><i class="fab fa-twitter"></i><span>Twitter Hesabımız</span></p></a> <?php } ?>
						<?php if(!empty(get_theme_mod('instagram_url'))){ ?><a href="<?php echo get_theme_mod('instagram_url') ?>" target="_blank" title="Instagram"><p><i class="fab fa-instagram"></i><span>İnstagram Hesabımız</span></p></a> <?php } ?>
						<?php if(!empty(get_theme_mod('youtube_url'))){ ?><a href="<?php echo get_theme_mod('youtube_url') ?>" target="_blank" title="Youtube"><p><i class="fab fa-youtube"></i><span>Youtube Kanalımız</span></p></a> <?php } ?>
						<?php if(!empty(get_theme_mod('github_url'))){ ?><a href="<?php echo get_theme_mod('github_url') ?>" target="_blank" title="Github"><p><i class="fab fa-github"></i><span>Github Hesabımız</span></p></a> <?php } ?>
						<?php if(get_theme_mod('tel_no_options') == '2' || get_theme_mod('tel_no_options') == '3'){ ?><a href="https://wa.me/90<?php echo get_theme_mod('tel_no') ?>" target="_blank" title="Whatsapp"><p><i class="fab fa-whatsapp"></i><span>Whatsapp'dan Yazın</span></p></a> <?php } ?>
						<?php if(get_theme_mod('tel_no_options') == '1' || get_theme_mod('tel_no_options') == '3'){ ?><a href="tel:+90<?php echo get_theme_mod('tel_no') ?>" title="Telefon"><p><i class="fas fa-phone-square-alt"></i><span>Bizi Arayın</span></p></a> <?php } ?>
						<?php if(!empty(get_theme_mod('mail_adresi'))){ ?><a href="mailto:<?php echo get_theme_mod('mail_adresi') ?>" title="Mail"><p><i class="fas fa-envelope"></i><span>Bize Ulaşın</span></p></a> <?php } ?>
					</div>
				</div>
				<div class="clearfix"></div>
				<?php the_content() ?>
			</div>
			<?php endwhile; endif; ?>
			<div class="alt-bolum">
				<?php the_tags('<div class="tags"><i class="fas fa-tags"></i> ',' ','</div>'); ?>
				<?php if (comments_open()): ?>
				<div class="comments-area">
					<h5 class="sub-header"><?php comment_form_title( 'Yorum Yap', '%s yanıtla' ); ?></h5>
					<!-- start respond form -->
					<div id="respond">
						<?php comments_template('/comments.php', false);?>
					</div>
					<!-- end respond form -->
					<!-- start blog comment -->
					<div class="mu-comments-area">
					  <div class="comments">
						<ul class="comment-list media-list col-md-12">
							<?php wp_list_comments('callback=twbs_comment_format'); ?>
						</ul>
					  </div>
					</div>
					<!-- end blog comment -->
				</div>
				<?php endif; ?>
			</div>
		</div>
	
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php get_footer(); ?>