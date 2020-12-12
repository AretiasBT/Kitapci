<!DOCTYPE HTML>
<html lang="<?php bloginfo( "language" ) ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|',true,'right').bloginfo('name'); ?></title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<?php wp_head() ?>
</head>
<body>
    <div id="wrap">
        <header>
		
			<div class="container">
				<div class="logo">
					<?php if ( function_exists( 'the_custom_logo' ) ) { echo '<a href="'.get_bloginfo('wpurl').'">'.the_custom_logo().'</a>'; } ?>
				</div>
				<nav id="navigation">
					<?php 
					wp_nav_menu( array(
						'menu'                 => '',
						'container'            => 'div',
						'container_class'      => '',
						'container_id'         => 'menu',
						'container_aria_label' => '', 
						'menu_class'           => '',
						'menu_id'              => 'main-menu',
						'echo'                 => true,
						'fallback_cb'          => 'wp_page_menu',
						'before'               => '',
						'after'                => '',
						'link_before'          => '',
						'link_after'           => '',
						'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'item_spacing'         => 'preserve',
						'depth'                => 0,
						'walker'               => '',
						'theme_location'       => 'primary',
					));
					?>
				</nav>
				
			</div>
        </header>
    </div>
	<?php if(get_theme_mod('header_banner_display')){ ?>
	<div class="container">
		<div class="ads">
			<a href="<?php echo get_theme_mod('header_banner_adres') ?>" rel="sponsored"><img src="<?php echo wp_get_attachment_url(get_theme_mod('header_banner_gorsel')) ?>" alt=""></a>
		</div>
	</div>
	<?php } ?>