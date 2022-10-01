<?php

?>

	<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="container mx-auto">
			<?php get_sidebar('footer-three'); ?> 
					<div class="row mb-3 relative">
					<div class="col-lg-5 mobile-hidden">
						<?php
						wp_nav_menu( array(
							'theme_location'    => 'footer',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'menu-list-container menu-list-container-footer',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);?>
					</div>
					<div class="col-lg-6">
					<?php get_sidebar('footer'); ?> 
					</div>
					<div class="top-button mx-auto my-3">
								<a class="button-career" href="#menu-menu-glowne">PRZEWIŃ <span class="text-white">&#94;</span>
</a>
							</div>
					</div>
					
				<div class="row middle-footer">
					<hr class="my-3 desktop-hidden w-100">
				<a class="navbar-brand custom-brand logo-none" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				
							if ( has_custom_logo() ) {
								echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . ' width="117" height="117">';
							} else {
								echo '<h1>' . get_bloginfo('name') . '</h1>';
							}?>	
		</a>
				
							<div class="col-lg-10 mobile-hidden">

							<?php get_sidebar('footer-two'); ?> </div>

							</div>
	
	
	
							
			</div>

					
		

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php if(is_front_page()): ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/splide.min.js"></script>
<script>
  new Splide( '.splide' ).mount();
</script>
<?php endif;?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
