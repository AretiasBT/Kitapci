<?php
get_header();
?>
	<div class="container">
		<div class="wrapper">
			<h1 class="bolum-baslik"><?php the_archive_title(); ?></h1>
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<?php $bilgiler = get_post_meta(get_the_ID(), 'kitap_bilgileri', true); ?>
			<a href="<?php the_permalink(); ?>">
			<div class="box">
					<div class="kitap-thumb">
						<?php the_post_thumbnail() ?>
						<span class="kitap-fiyat"><?php echo $bilgiler['kitap_fiyati']; ?> ₺</span>
					</div>
					<div class="kitap-isim"><?php the_title(); ?></div>
			</div>
			</a>
			<?php endwhile; endif; ?>
			<?php dynamic_sidebar('full-width'); ?>
		</div>
		<div class="alt-bolum">
		
		</div>
		
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php get_footer(); ?>