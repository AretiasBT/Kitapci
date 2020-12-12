<?php
get_header();
?>
	<div class="container">
		<div class="wrapper">
        <h2 class="bolum-baslik">Kitaplar</h2>
            <div class="books">
            <?php
				$args = array(
					'post_type' => 'kitaplar',
					'tax_query' => array(
						'taxonomy' => 'kitap_kategorileri'
					),
					'showposts' => '8',
				);
				$kitaplar = new WP_Query( $args );
				if( $kitaplar->have_posts() ) {
					while( $kitaplar->have_posts()){
					$kitaplar->the_post();
					$bilgiler = get_post_meta(get_the_ID(), 'kitap_bilgileri', true);
				?>	
					<a href="<?php the_permalink(); ?>">
					<div class="box">
						<div class="kitap-thumb">
							<?php the_post_thumbnail() ?>
							<span class="kitap-fiyat"><?php echo $bilgiler['kitap_fiyati']; ?> ₺</span>
						</div>
						<div class="kitap-isim"><?php the_title(); ?></div>
					</div>
					</a>
			<?php }}  ?>
			
            <div class="view-all"><a class="buton-right" href="http://aretias.net/wp/kitaplar">Tüm Kitapları Gör <i class="fas fa-angle-double-right"></i></a></div>
            </div>
			<?php dynamic_sidebar('full-width'); ?>
            <h2 class="bolum-baslik">Makaleler</h2>
			<div class="posts">
            <?php 
                query_posts('showposts=5','tax = false');  
				while (have_posts()):the_post();
            ?>
                <div class="post">
                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="thumbnail">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a>
                    </div>
                    <div class="ozet">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="meta">
                        <span class="meta-link"><?php the_author(); ?></span><span class="meta-link"><?php the_category('name') ?></span><span class="meta-link"><a href="<?php the_permalink(); ?>">DEVAMI &raquo;</a></span>
                    </div>
                </div>
                <?php endwhile; ?>
				<div class="view-all"><a class="buton-right" href="http://aretias.net/wp/blog">Tüm Makaleleri Gör <i class="fas fa-angle-double-right"></i></a></div> 
            </div>
			<?php if(get_theme_mod('homepage_banner_display')){ ?>
				<div class="ads">
					<a href="<?php echo get_theme_mod('homepage_banner_adres') ?>" rel="sponsored"><img src="<?php echo wp_get_attachment_url(get_theme_mod('homepage_banner_gorsel')) ?>" alt=""></a>
				</div>
			<?php } ?>
		</div>
	
		<div class="sidebar"> 
            <?php get_sidebar(); ?>
		</div>
	</div>
    <?php get_footer(); ?>