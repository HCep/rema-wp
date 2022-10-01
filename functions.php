<?php

if ( ! function_exists( 'materialwp_setup' ) ) :

function materialwp_setup() {

	
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}


	load_theme_textdomain( 'materialwp', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	
	add_theme_support( 'title-tag' );

	function themename_custom_logo_setup() {
		$defaults = array(
			'height'               => 100,
			'width'                => 200,
			'flex-height'          => true,
			'flex-width'           => true,
			'header-text'          => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => true, 
		);
	 
		add_theme_support( 'custom-logo', $defaults );
	}
	 themename_custom_logo_setup();

	add_theme_support( 'post-thumbnails' );

	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'materialwp' ),
		'mobileD' => __( 'Mobile Dropdown Menu', 'materialwp' ),
		'mobileI' => __( 'Mobile Icon Menu', 'materialwp' ),
		'contact' => __( 'Contact Menu', 'materialwp' ),
		'footer' => __( 'Footer Menu', 'materialwp' ),
	) );


	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	
	add_theme_support( 'custom-background', apply_filters( 'materialwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; 
add_action( 'after_setup_theme', 'materialwp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function materialwp_widgets_init() {
	register_sidebar( array(
		'name'          => 'contact-panel',
		'id'            => 'contact-panel',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget-sidebar %2$s"><div class="">',
		'after_widget'  => '</div></aside>',
		'before_title'  => ' <div class=""><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          =>  'Widgety stopki 1',
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		
	) );
	register_sidebar( array(
		'name'          => 'Widgety stopki 2',
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Widgety stopki 3',
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'materialwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function materialwp_scripts() {

	
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), '', 'all' );
	wp_enqueue_style( 'mwp-bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0', 'all' );

	wp_enqueue_style( 'materialwp-style', get_stylesheet_uri() );

	wp_enqueue_style( 'hamburger', get_template_directory_uri() . '/css/hamburgers.css', array(), '', 'all' );


	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'materialwp_scripts' );


require get_template_directory() . '/inc/template-tags.php';


require get_template_directory() . '/inc/extras.php';


require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/bootstrap-walker.php';


require get_template_directory() . '/inc/comments-callback.php';


  //** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');
//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


function cptui_register_slider() {

	$labels = [
		"name" => __( "Slajdy", "Rema" ),
		"singular_name" => __( "slide", "Rema" ),
	];

	$args = [
		"label" => __( "Slajdy", "Rema" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "slide", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'custom-fields'],
		"taxonomies" => [ "" ],
		"show_in_graphql" => false,
	];

	register_post_type( "slide", $args );
}

add_action( 'init', 'cptui_register_slider' );

function cptui_register_certificate() {

	$labels = [
		"name" => __( "Certyfikaty", "Rema" ),
		"singular_name" => __( "certificate", "Rema" ),
	];

	$args = [
		"label" => __( "certificate", "Rema" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "certificate", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'custom-fields'],
		"taxonomies" => [ "" ],
		"show_in_graphql" => false,
	];

	register_post_type( "certificate", $args );
}

add_action( 'init', 'cptui_register_certificate' );


function cptui_register_career() {

	$labels = [
		"name" => __( "Oferty pracy", "Rema" ),
		"singular_name" => __( "oferty", "Rema" ),
	];

	$args = [
		"label" => __( "oferty", "Rema" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "oferty", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'custom-fields'],
		"taxonomies" => [ "" ],
		"show_in_graphql" => false,
	];

	register_post_type( "oferty", $args );
}

add_action( 'init', 'cptui_register_career' );

function social_share_shortcode(){
	global $post;

	 
	$str = get_site_url();
	$str = preg_replace('#^https?://#i', '', $str);
	
	$social .= '<div class="d-flex flex-wrap">';

	$social .= '<div class="fb-share-button" ><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F'.$str.'/'.$post->post_name.'%2F&amp;src=sdkpreparse" ><img src="'.get_template_directory_uri().'/images/facebook.svg"></a></div>';

	$social .= '<div class="pl-3"><a href="https://www.instagram.com"><img src="'.get_template_directory_uri().'/images/instagram.svg"></a></div>';
	
	$social .= '<div class="pl-3"><a href="https://www.linkedin.com/shareArticle?mini=true&summary='.$post->post_name.'&title='.$post->post_name.'&url='. get_permalink() .'"><img src="'.get_template_directory_uri().'/images/linkedin.svg"></a></div>';

	$social .= '<div class="pl-3"><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Hello%20world"><img src="'.get_template_directory_uri().'/images/twitter.svg"></a></div>';

	$social .= '</div>';
	
	return $social;
}
add_shortcode( 'social-share', 'social_share_shortcode' ); 



	//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );

return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');



function shortcode_slide(){
 
	$result .= '<section class="splide" >';
	$result .= '<div class="splide__track">';
	$result .=	'<ul class="splide__list">';
  $args = array(
				  'post_type'      => 'slide',
				  'posts_per_page' => -1,
				  'publish_status' => 'published',
			   );

  $query = new WP_Query($args);

  if($query->have_posts()) :

	  while($query->have_posts()) :

		  $query->the_post() ;
		  $result .= '<li class="splide__slide">';
          $result .=  '<img src="'. get_field('slide_image')['url']  .'" alt="'. get_field('slide_image')['alt']  .'" />';
		  $result .= '<div class="slide__content"><h1>'. get_field('slide_title')  .'</h1>';
		  $result .= '<p class="slide__text"> '. get_field('slide_text')  .'</p>';
          $result .=  '<div class="slide__button__cnt"><a class="slide__button" href="'. get_field('slide_button')['url']  .'">'. get_field('slide_button')['title']  .'</a></div>';
          $result .=  '</div></li>';
	  endwhile;

	  wp_reset_postdata();

  endif;    
 			
  $result .=   '</ul>';
  $result .=  '</div>';
  $result .= '</section>';


	
  return  $result;            
}

add_shortcode( 'slide', 'shortcode_slide' ); 

function shortcode_certificate(){
	
	$content .= '<div class="container mx-auto">';
	$content .= '<div class="row mx-auto justify-content-center">';
	
	$args = array(
		'post_type'      => 'certificate',
		'posts_per_page' => '4',
		'orderby' => 'date',
      	'order' => 'ASC',
		'publish_status' => 'published',
		'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
	 );
     
		$the_query = new WP_Query($args);

		if($the_query->have_posts()) :

		while($the_query->have_posts()) :
			$the_query->the_post() ;

			$content .= '<div class="certificate-column mr-md-3 mb-5 certificate-cnt">';
			$content .= '<div class="row mb-4">';
			$content .= '<div class="col-md-6 certificate-image-cnt">';
			$content .= '<img src="'. get_field('certificate_image')['url'] .'"/>';
			$content .= '</div>';
			$content .= '<div class="col-md-6 d-flex justify-content-start align-items-center">';
			$content .= '<h3 class="certificate-title">'.  get_field('certificate_title').'</h3>';
			$content .= '</div>';
			$content .= '</div>';
			$content .= '<div class="col-md-12">';
			$content .= '<p class="certificate-description">'. get_field('certificate_description') .'</p>';
			$content .= '<a href="'. get_field('certificate_pdf')['url'] .'" class="certificate-button">POBIERZ</a>';
			$content .= '</div>';
			$content .= '</div>';


		endwhile;
	endif; 
	$content .= '</div>';
	
	
	$content .= '<div class="pagintaion-container">';
	$content .= '<div class="pagintaion-content">';
	
	$big = 999999999; 
	 paginate_links( array(
	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $the_query->max_num_pages,
	'prev_text'    => '.',
	'next_text'    => '.',
	) );

	$content .= '</div>';
	$content .= '</div>';
	
	wp_reset_postdata();
return $content;


}
add_shortcode( 'certyfikaty', 'shortcode_certificate' ); 

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {

	foreach( $items as &$item ) {
	
		$icon = get_field('menu_icon', $item);
	
		if( $icon ) {
			
			$item->title .= '<img class="icon-menu" src="'.$icon["url"].'">';
			
		}
		
	}
	return $items;
	
}