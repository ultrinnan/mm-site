<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 */

get_header();
?>

<section class="section error404">
    <div class="container">
        <div class="icon404"></div>

        <h2><?=pll__('404_header');?></h2>

	    <?php
	    if ( is_active_sidebar( 'page404' ) ) {
		    dynamic_sidebar( 'page404' );
	    }
	    ?>
    </div>
</section>

<?php get_footer(); ?>
