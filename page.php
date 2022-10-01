<?php
get_header(); 
global $post;

?>
<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <header class="banner-container w-100 d-flex flex-column" style="background-image:url('<?php echo $image[0]; ?>'); ">
    <div class="overlay"></div>
  <div class="container mx-auto">
  <div class="baner-content">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p class="text-white breadcrumbs-custom-style upper" id="breadcrumbs">','</p>' );
        }
        ?>
        <h1 class="text-white font-weight-light font-48 upper"><?php the_title(); ?></h1>
    </div>
    </div>
    </header>
<?php endif; ?>



<main>
    <div class="container-fluid px-0 mx-0">
        <?php the_content(); 
        if(is_page('certyfikaty')):
        ?>
        <div class="container mx-auto">
	<div class="row mx-auto justify-content-center">
	<?php
	$args = array(
		'post_type'      => 'certificate',
		'posts_per_page' => '4',
		'orderby' => 'date',
      	'order' => 'ASC',
		'publish_status' => 'published',
		'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
	 );
     
		$query = new WP_Query($args);

		if($query->have_posts()) :

		while($query->have_posts()) :
			$query->the_post() ;?>

			<div class="certificate-column mr-md-3 mb-5 certificate-cnt">
			<div class="row mb-4">
			<div class="col-md-6 certificate-image-cnt">
			<img src="<?php echo get_field('certificate_image')['url']; ?>"/>
			</div>
			<div class="col-md-6 d-flex justify-content-start align-items-center">
			<h3 class="certificate-title"><?php echo get_field('certificate_title'); ?></h3>
			</div>
			</div>
			<div class="col-md-12">
			<p class="certificate-description"><?php echo get_field('certificate_description'); ?></p>
			
			</div>
			<div class="col-md-12 mt-4 pb-3 mb-3">
			<a href="<?php echo get_field('certificate_pdf')['url']; ?>" class="certificate-button">POBIERZ</a>
			</div>
			</div>

<?php
		endwhile;
	endif; ?>
	</div>
	<div class="pagintaion-container">
	<div class="pagintaion-content">

<?php
	$url_right_arrow = get_template_directory_uri().'/images/arrow-right-pagination.svg';
	$url_left_arrow = get_template_directory_uri().'/images/arrow-left-pagination.svg';
	$big = 999999999; 
	echo paginate_links( array(
	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $query->max_num_pages,
	'prev_text'    => '.',
	'next_text'    => '.',
	) );
	wp_reset_postdata();
?>
	</div>
	</div>
    <?php endif;?>
	<style>
		.page-numbers:first-child:after{
			top:0px;
			left:-30px;
			background-image:url(<?php echo $url_left_arrow ?>);
			

		}
		.page-numbers:last-child:before{
			top:0;
			right:-30px;
			background-image:url(<?php echo $url_right_arrow ?>);
			
		}

	</style>
			</div>
        <?php 
        if(is_page('ogloszenia-o-prace')):?>

        <div class="container mx-auto">
        <div class="row mx-auto justify-content-center">
        <?php
            $args = array(
                'post_type'      => 'oferty',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
                'publish_status' => 'published',
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
            );
     
		$query = new WP_Query($args);

		if($query->have_posts()) :

		while($query->have_posts()) :
			$query->the_post() ;?>

            <div class="col-12 mb-5 p-5 career-container">
                <div class="upper-career pb-3">
                    <h3><img class="pr-md-3 " src="<?php echo get_field('offert_icon')['url']; ?>"/><?php echo get_field('offert_title');?></h3>
                </div>
                <div class="d-flex py-3">
                <p class="pr-md-5"><?php echo get_field('offert_experience');?></p>
                <p><?php echo get_field('offert_education');?></p>
                </div>
                <div class="desc-career mb-3">
                    <p><?php echo get_field('offert_description');?></p>
                   <div class="btn-career-cnt mt-3"> 
                       <a class="button-career" href="<?php echo get_field('offert_button')['url']; ?>"><?php echo get_field('offert_button')['title'];?></a>
                </div>
                </div>




            </div>


    <?php endwhile;

    endif;
	wp_reset_postdata();?>
        </div>
        </div>
    <?php endif;?>
	</div>
</main>

<?php get_footer(); ?>


     
    </div>
  </div>