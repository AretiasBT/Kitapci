<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>Yorum yazabilmek için lütfen <a href="<?php echo wp_login_url( get_permalink() ); ?>">Giriş Yapın</a></p>
<?php else : ?>

<form role="form" class="comment-form form-container" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

	<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> olarak giriş yapıldı. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Çıkış Yap</a></p>

	<?php else : ?>
	<div class="form-grup">
		<div class="form-element-s">
			<label class="label-s" for="author">İsim</label>
			<input type="text" class="form-input" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" placeholder="İsim" <?php if ($req) echo "aria-required='true'"; ?> />
		</div> <!-- .form-group -->

		<div class="form-element-s">
			<label class="label-s" for="email">Eposta</label>
			<input type="text" class="form-input" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" placeholder="Eposta" <?php if ($req) echo "aria-required='true'"; ?> />
		</div> <!-- .form-group -->

		<div class="form-element-s">
			<label class="label-s" for="url">Website</label>
			<input type="text" class="form-input" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" placeholder="Website" />
		</div> <!-- .form-group -->
	</div>
		<?php endif; ?>

	<div class="form-grup">
		<div class="form-element-l">
			<label class="label-l" for="comment">Yorumunuz</label>
			<textarea class="form-input-textarea" name="comment" id="comment" tabindex="8" placeholder="Yorumunuzu buraya yazın..."></textarea>
			<!-- <span class="help-block"><small>You can use these HTML tags:<br /><code><?php echo allowed_tags(); ?></code></small></span> -->
		</div>
	</div> <!-- .form-group -->
		<div class="form-grup">
			<div class="form-element-l">
				<label class="label-l" for="to-comment">Yorumu Gönder</label>
				<input id="to-comment" type="submit" class="form-input" tabindex="5" value="Yorumla..." />
				<?php comment_id_fields(); ?>
			</div> <!-- .form-group -->
		</div>

	<?php do_action('comment_form', $post->ID); ?>  

</form>


<?php endif;// If registration required and not logged in ?>