<?php
get_header();
?>
	<div class="container">
		<div class="wrapper">
            <h1 class="bolum-baslik"><?php single_post_title(); ?></h1>
            <div class="posts">
            <?php  while (have_posts()):the_post(); ?>
                <div class="post">
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
			<?php page_navi(); ?>
            </div>
			<?php dynamic_sidebar('full-width'); ?>
        </div>
		<div class="sidebar">
           <?php get_sidebar(); ?>
		</div>
    </div>
    <?php get_footer(); ?> 