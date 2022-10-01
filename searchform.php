<?php 

//custom search form 


?>
<form role="search" method="get" class="search-form" id="search_form" action="<?php echo home_url( '/' ); ?>">

<input type="image" name="submit" alt="submit" class="search-submit" src="<?php echo get_template_directory_uri(); ?>/images/bx-search.svg" />

    <label class="search-label">
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="search"  class="search-field"
            placeholder="<?php echo esc_attr_x( 'Szukaj', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
  
   
</form>
 