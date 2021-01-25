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
        <h1>404</h1>
        <h2><?=pll__('404_header');?></h2>
    </div>
</section>
<section class="section error404">
    <div class="container">
        <?php
        if ( is_active_sidebar( 'page404' ) ) {
            dynamic_sidebar( 'page404' );
        }
        ?>
    </div>
</section>

<?php get_footer(); ?>
