<?php

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/splide.min.css">

<?php wp_head(); ?>
<style>
	@font-face {
		font-family:'FF Unit Pro' sans-serif;
		src: url('<?php echo get_template_directory_uri(); ?>/fonts/FF Unit Pro Regular.otf');
	}
	@font-face {
		font-family:'FF Unit Pro' sans-serif ;
		src: url('<?php echo get_template_directory_uri(); ?>/fonts/FF Unit Pro Bold.otf');
	}
	@font-face {
		font-family:'FF Unit Pro' sans-serif ;
		src: url('<?php echo get_template_directory_uri(); ?>/fonts/FF Unit Pro Medium.otf');
	}
	.slide__button:after{
		background-image:url('<?php echo get_template_directory_uri(); ?>/images/border-button.svg');
		background-repeat: no-repeat;
		background-size:100%;
		background-position:center;
		
	}
	ul {
    list-style-image: url("<?php echo get_template_directory_uri(); ?>/images/list-check.svg")
  }
  .background-cropped{
	  background-image:url('<?php echo get_template_directory_uri(); ?>/images/cropped-background.webp');
	  background-position:5% 0%;
	  background-repeat: no-repeat;
  }
  span.wpcf7-list-item-label{
	  padding-left:10px;
  }
  .checkbox-form{
	  position:relative;
	  display:none;
  }
  input[type=checkbox].checkbox-form + span.wpcf7-list-item-label:after{
	  content:'';
	position:absolute;
	top:0;
	left:0;
	background-image:url('<?php echo get_template_directory_uri(); ?>/images/checkbox.svg');
	background-repeat: no-repeat;
	background-position:left;
	display:inline-block;
	width:100%;
	height:23px;
    
}
input[type=checkbox].checkbox-form:checked + span.wpcf7-list-item-label:before{
	content:'';
	position:absolute;
	top:0;
	left:0;
	background-image:url('<?php echo get_template_directory_uri(); ?>/images/checkbox-checked.svg');
	background-repeat: no-repeat;
	background-position:2% 2%;
	display:inline-block;
	width:100%;
	height:100%;
}

.background-map-marker{
	position:relative;
	
}
.background-map-marker:after{
	background-image:url('<?php echo get_template_directory_uri(); ?>/images/marker-map.svg');
}
.splide__arrow--prev{
	background-image:url('<?php echo get_template_directory_uri(); ?>/images/arrow-left.svg');

}

.splide__arrow--next{
	background-image:url('<?php echo get_template_directory_uri(); ?>/images/arrow-right.svg');

}
</style>
</head>

<body <?php body_class(); ?>>
<?php if(!is_front_page()){?>


<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v13.0" nonce="p0jTVXw0"></script>
<?php } ?>

<div id="page" class="feed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'materialwp' ); ?></a>
	<div class="upper-nav mobile-hidden">
	<div class="upper-cnt">
		
		<?php wp_nav_menu( array(
									'theme_location'    => 'contact',
									'depth'             => 2,
									'container'         => false,
									'menu_class'        => 'menu-list-container menu-list-container-contact',
									'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
									'walker'            => new wp_bootstrap_navwalker())
								);?>
	
	</div>
	</div>
	<div class="head-cnt">

	<div class="container head-cnt">
	
	<nav class="navbar navbar-expand-lg">
	
  
	<a class="navbar-brand custom-brand logo-none" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				
							if ( has_custom_logo() ) {
								echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . ' width="117" height="117">';
							} else {
								echo '<h1>' . get_bloginfo('name') . '</h1>';
							}?>	
		</a>
  
<div class="nav-cnt">

<div class="mobile-icon desktop-hidden">
<?php
						wp_nav_menu( array(
							'theme_location'    => 'mobileI',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'menu-list-container-mobilei',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					
					?>
					<div class="search-mobile">
					<?php get_search_form(); ?>
					</div>

<button class="hamburger hamburger--squeeze navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>

  </button>
  </div>
  <div class="mobile-hidden">
    <div class="navbar-nav align-items-center">
	<?php
						wp_nav_menu( array(
							'theme_location'    => 'primary',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'menu-list-container menu-list-container-main',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					
					?>
		<div class="mobile-hidden">
		<?php get_search_form(); ?>
		</div>
		
     
	</div>
    </div>
  <div class="collapse navbar-collapse desktop-hidden" id="navbarNavAltMarkup">
    <div class="navbar-nav align-items-center">
	<?php
						wp_nav_menu( array(
							'theme_location'    => 'mobileD',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'menu-list-container menu-list-container-main',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					
					?>
		<div class="mobile-hidden">
		<?php get_search_form(); ?>
		</div>
		
     
	</div>
    </div>
  </div>
  </div>	
  
</nav>

</div>

	<div id="content" class="site-content">
