<?php

function my_scripts_method(){ 
	wp_enqueue_script('custom-script', get_stylesheet_directory_uri().'/js/functions.js', array('jquery'), '1.0.4', true); 

	} 
	add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

function stylesheet() {
    wp_enqueue_style('my-styles', get_stylesheet_directory_uri().'/style.css', array(), '1.1.3' );       
}

add_action('wp_enqueue_scripts', 'stylesheet');


add_theme_support('menus');

register_nav_menus( array(
    'primary' => __( 'Birincil Menü', 'Kitapci' ),
	'secondary' => __( 'Alt Menü', 'kitapci' ),
) );

/* LOGO */
add_theme_support( 'custom-logo' );

function kitapci_custom_logo_setup() {
	$defaults = array(
	'height'		=> 100,
	'width'       	=> 400,
	'flex-height' 	=> true,
	'flex-width'  	=> true,
	'header-text' 	=> array( 'site-title', 'site-description' ),
	'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'kitapci_custom_logo_setup' );

   /* LOGO END */
	
	//Copyright Start
   
	function copyright( $wp_customize ) {
		
		$wp_customize->add_section('copyright_section', array(
			'title' 		=> 'Alt Bilgi (Copyright)',
		));
		
		$wp_customize->add_setting('copyright_display', 
		array(
			'default' 		=> 'Yes',
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'copyright_display_control', array(
			'label'			=> 'Alt Bilgi Göster',
			'description' 	=> 'Sayfaların altındaki Copyright alanını göster/gizle',
			'section' 		=> 'copyright_section', 
			'settings' 		=> 'copyright_display',
			'type'    		=> 'select',
			'choices' 		=> array('Yes' => 'Göster', 'No' => 'Gizle')
		)));

		$wp_customize->add_setting('copyright_metni',
		array(
			'default' 		=> 'Aretias BT'
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'copyright_metni_control', array(
			'label'   		=> 'Metin',
			'description'	=> 'Alt bilgide gösterilecek bağlantı metni',
			'section' 		=> 'copyright_section', 
			'settings' 		=> 'copyright_metni',
			'type'    		=> 'text',
		)));
		
		$wp_customize->add_setting('copyright_adresi',
		array(
			'default' 		=> 'http://aretias.net'
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'copyright_adresi_control', array(
			'label'   		=> 'URL Adresi',
			'description' 	=> 'Yönlendirilecek intenet adresi',
			'section' 		=> 'copyright_section', 
			'settings' 		=> 'copyright_adresi',
			'type'    		=> 'url',
		)));
		
		$wp_customize->add_setting('copyright_gorseli',
		array(
			'default' 		=> '',
			'type'			=> 'theme_mod',
			'capability' 	=> 'edit_theme_options'
		));

		$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'copyright_gorseli_control', array(
			'label'   		=> 'Görsel',
			'description' 	=> 'Lütfen bir görsel seçin...',
			'section' 		=> 'copyright_section', 
			'settings' 		=> 'copyright_gorseli',
			'width'			=> 64,
			'height' 		=> 64
		)));
		
		$wp_customize->add_setting('copyright_diger',
		array(
			'default' 		=> 'Tasarım: Samet Karaca'
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'copyright_diger_control', array(
			'label'			=> 'Dğer bilgiler Adresi',
			'description' 	=> 'Burada HTML Etiketleri Kullanabilirsiniz...',
			'section' 		=> 'copyright_section', 
			'settings' 		=> 'copyright_diger',
			'type'    		=> 'textarea',
		)));
		
	}
	
	add_action('customize_register','copyright');

	//Copyright END
	
	// BANNER & REKLAM ALANI
	
	function banner( $wp_customize ) {
		$wp_customize->add_section('banner_section', array(
			'title' 		=> 'BANNER',
		));
		
		//HEADER BANNER
      
        $wp_customize->add_setting('header_banner_display', 
            array(
                'default' 	=> true,
                'choices' 	=> ('checked' ? true : false)
            )
        );
          
        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'header_banner_display_control', 
            array(
                'label' 	=> 'Her sayfanın üst kısmında banner göster',
                'section' 	=> 'banner_section',
				'settings' 	=> 'header_banner_display',
                'type' 		=> 'checkbox'
            )
        ));    
		
		$wp_customize->add_setting('header_banner_adres',
		array(
			'default' 		=> null
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'header_banner_adres_control', array(
			'label'   		=> 'Header Banner URL Adresi',
			'description' 	=> 'Bannera tıklandığında yönlendirilecek URL adresi',
			'section' 		=> 'banner_section', 
			'settings' 		=> 'header_banner_adres',
			'type'    		=> 'url',
		)));
		
		$wp_customize->add_setting('header_banner_gorsel',
		array(
			'default' 		=> '',
			'type'			=> 'theme_mod',
			'capability' 	=> 'edit_theme_options'
		));

		$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'header_banner_gorsel_control', array(
			'label'   		=> 'Header Banner Görsel',
			'description' 	=> 'Banner alanı için görsel seçniz',
			'section' 		=> 'banner_section', 
			'settings' 		=> 'header_banner_gorsel',
			'width'			=> 1280,
			'height' 		=> 300,
			'flex_width'	=>true, //Flexible Width
			'flex_height'	=>true, // Flexible Heiht
		)));

		// HOMEPAGE BANNER 
      
        $wp_customize->add_setting('homepage_banner_display', 
            array(
                'default' 	=> false,
                'choices' 	=> ('checked' ? true : false)
            )
        );
          
        $wp_customize->add_control('homepage_banner_display_control', 
            array(
                'label' 	=> 'Anasayfa alt kısmında banner göster',
                'section' 	=> 'banner_section',
				'settings' 	=> 'homepage_banner_display',
                'type' 		=> 'checkbox'
            )
        );    
		
		$wp_customize->add_setting('homepage_banner_adres',
		array(
			'default' => null
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'homepage_banner_adres_control', array(
			'label'   => 'Anasayfa Alt Banner URL Adresi',
			'description' => 'Bannera tıklandığında yönlendirilecek URL adresi',
			'section' => 'banner_section', 
			'settings' => 'homepage_banner_adres',
			'type'    => 'url',
		)));
		
		$wp_customize->add_setting('homepage_banner_gorsel',
		array(
			'default' => '',
			'type'	=> 'theme_mod',
			'capability' => 'edit_theme_options'
		));

		$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'homepage_banner_gorsel_control', array(
			'label'   => 'Anasayfa Alt Banner Görseli',
			'description' => 'Banner alanı için görsel seçniz',
			'section' => 'banner_section', 
			'settings' => 'homepage_banner_gorsel',
			'width'	=> 728,
			'height' => 90,
			'flex_width'=>true, //Flexible Width
			'flex_height'=>true, // Flexible Heiht
		)));
	}
	
	add_action('customize_register','banner');
	// BANNER & REKLAM ALANI END 
	
   
	add_theme_support('post-thumbnails');
	//add_image_size('small',300,300,false);
	//add_image_size('large',600,600,false);
	
	// Sidebar Start

    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-right',
		'before_widget' => '<div class="sidebar-body">',
		'before_title'  => '<h3 class="bolum-baslik">', 
        'after_title'   => '</h3>',
        'after_widget'  => '</div>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'FullWidth Sidebar', 'theme_name' ),
        'id'            => 'full-width',
        'before_widget' => '<div class="sidebar-body">',
		'before_title'  => '<h3 class="bolum-baslik">',
        'after_title'   => '</h3>',
		'after_widget'  => '</div>',
    ) );
	
	register_sidebar( array(
        'name'          => __( 'FooterOne Sidebar', 'theme_name' ),
        'id'            => 'footer-one',
        'before_widget' => '<div class="sidebar-body">',
		'before_title'  => '<h5 class="sub-header">',
		'after_title'   => '</h5>',
        'after_widget'  => '</div>',
    ) );
	
	register_sidebar( array(
        'name'          => __( 'FooterTwo Sidebar', 'theme_name' ),
        'id'            => 'footer-two',
        'before_widget' => '<div class="sidebar-body">',
		'before_title'  => '<h5 class="sub-header">',
		'after_title'   => '</h5>',
        'after_widget'  => '</div>',
    ) );
	register_sidebar( array(
        'name'          => __( 'FooterThree Sidebar', 'theme_name' ),
        'id'            => 'footer-three',
        'before_widget' => '<div class="sidebar-body">',
		'before_title'  => '<h5 class="sub-header">',
		'after_title'   => '</h5>',
        'after_widget'  => '</div>',
    ) );
	register_sidebar( array(
        'name'          => __( 'FooterFour Sidebar', 'theme_name' ),
        'id'            => 'footer-four',
        'before_widget' => '<div class="sidebar-body">',
		'before_title'  => '<h5 class="sub-header">',
		'after_title'   => '</h5>',
        'after_widget'  => '</div>',
    ) );
	
	add_filter("use_block_editor_for_post_type","__return_false",100);
	
	// Sidebar END
	
	/*
	* Numeric Page Navi
	*/
	
	function page_navi($before = '', $after = '') {
    global $wpdb, $wp_query;
    $request = $wp_query->request;
    $posts_per_page = intval(get_query_var('posts_per_page'));
    $paged = intval(get_query_var('paged'));
    $numposts = $wp_query->found_posts;
    $max_page = $wp_query->max_num_pages;
    if ( $numposts <= $posts_per_page ) { return; }
    if(empty($paged) || $paged == 0) {
        $paged = 1;
    }
    $pages_to_show = 5;
    $pages_to_show_minus_1 = $pages_to_show-1;
    $half_page_start = floor($pages_to_show_minus_1/2);
    $half_page_end = ceil($pages_to_show_minus_1/2);
    $start_page = $paged - $half_page_start;
    if($start_page <= 0) {
        $start_page = 1;
    }
    $end_page = $paged + $half_page_end;
    if(($end_page - $start_page) != $pages_to_show_minus_1) {
        $end_page = $start_page + $pages_to_show_minus_1;
    }
    if($end_page > $max_page) {
        $start_page = $max_page - $pages_to_show_minus_1;
        $end_page = $max_page;
    }
    if($start_page <= 0) {
        $start_page = 1;
    }
         
    echo $before.'<div class="paginavi"><nav aria-label="Page navigation example" class="blog-pagination"> <ul class="pagination">'."";
    if ($paged > 1) {
        $first_page_text = '<i class="fas fa-angle-double-left"></i>';
        echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link().'" title="İlk Sayfa" tabindex="-1" aria-disabled="true">'.$first_page_text.'</a></li>';
    }
         
    $prevposts = get_previous_posts_link('<i class="fas fa-angle-left"></i>');
    if($prevposts) { echo '<li class="page-item">' . $prevposts  . '</li>'; }
    else { echo '<li class="page-item disabled"><a href="#"><i class="fas fa-angle-left"></i></a></li>'; }
     
    for($i = $start_page; $i  <= $end_page; $i++) {
        if($i == $paged) {
            echo '<li class="page-item active" aria-current="page">'.$i.'</li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
        }
    }
    echo '<li class="page-item">';
    next_posts_link('<i class="fas fa-angle-right"></i>');
    echo '</li>';
    if ($end_page < $max_page) { 
        $last_page_text = '<i class="fas fa-angle-double-right"></i>';
        echo '<li class="page-item next"><a class="page-link" href="'.get_pagenum_link($max_page).'" title="Son Sayfa" title="Last">'.$last_page_text.'</a></li>';
    }
    echo '</ul></nav></div>'.$after."";
}
 
add_filter( 'excerpt_length', 'olsen_light_excerpt_length' );
function olsen_light_excerpt_length( $length ) {
return get_theme_mod( 'excerpt_length', 55 );
}

/*
* Comments
*/

// Add Class to Comment Reply Link
add_filter('comment_reply_link', 'twbs_reply_link_class');
function twbs_reply_link_class($class){
	$class = str_replace("class='comment-reply-link", "class='comment-reply-link btn btn-default btn-xs", $class);
	return $class;
}

// Customize Comment Output
function twbs_comment_format($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
			<div class="comment-meta">
				<div class="comment-avatar"><?php echo get_avatar( $comment, 96 ); ?></div>
				<div class="comment-author"><?php comment_author_link(); ?></div>
				<div class="comment-date"><?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' önce'; ?> &nbsp;<a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>" title="Comment Permalink"><i class="icon-link"></i></a></div>
			</div> <!-- .comment-meta -->
			<div class="comment-content">
				<?php if ($comment->comment_approved == '0') { // Awaiting Moderation ?>
					<em><?php _e('Yorumunuz onay bekliyor.') ?></em>
				<?php } ?>
				<div class="comment-text">
				<?php comment_text(); ?>
				</div>
				<div class="comment-reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fas fa-reply"></i>&nbsp; Yanıtla' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
				<div class="clearfix"></div>
				
			</div> <!-- .comment-content -->
	</li>
<?php } // twbs_comment_format 

// Comment END


// Add Class to Gravatar
add_filter('get_avatar', 'twbs_avatar_class');
function twbs_avatar_class($class) {
	$class = str_replace("class='avatar", "class='avatar img-circle media-object", $class);
	return $class;
}



/*
*
* SearchForm
*
*/


function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="mu-search-form" action="' . home_url( '/' ) . '" >
		<div class="form-element-l">
			<div class="form-grup">
				<label class="label-l" for="s">ARA</label>
				<input type="text" value="' . get_search_query() . '" name="s" id="s" />
				<button class="mu-search-submit-btn" type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'"><i class="fa fa-search"></i></button>
			</div>
		</div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' ); 

//Sosyal Ağlar
   
require get_template_directory().'/inc/sosyal-medya.php';
new TheMinimalist_Customizer();

//Sosyal Ağlar END

/* CUSTOM POST Kitaplar */

require get_template_directory().'/inc/kitap-post-type.php';


// Mail Content Type HTML Kullanma

remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );

function wpdocs_set_html_mail_content_type() {
    return 'text/html';
}
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );

?>