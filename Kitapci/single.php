<?php
require_once 'header.php';
?>
	<div class="container">
		<div class="wrapper">
			<h1 class="bolum-baslik"><?php single_post_title() ?></h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="article">
				<?php the_content() ?>
			</div>
			<?php endwhile; endif; ?>
			<div class="alt-bolum">
				<div class="meta">
					<span class="meta-link"><?php the_author(); ?></span><span class="meta-link"><?php the_category('name') ?></span><span class="meta-link"><?php the_date() ?></span>
				</div>
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
			<?php dynamic_sidebar('full-width'); ?>
			</div>
	
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php get_footer(); ?>