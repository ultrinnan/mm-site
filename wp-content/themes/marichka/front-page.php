<?php
/*
 * Template Name: Front page
 */

get_header();

$hero_image = get_field('hero_picture');
$style = $hero_image ? 'style="background: url(' . $hero_image . ') center no-repeat; background-size: cover;"' : '';

$hero_video = get_field('hero_video');
$certLink = get_field('certificates_link');
?>

<section class="section hero" <?=$style;?>>
    <div class="container">
	    <?php if (have_posts()): while (have_posts()): the_post(); ?>
		    <?php //the_content(); ?>
	    <?php endwhile; endif; ?>
        <h1>Smart Electric Motorcycles</h1>
        <h2>coming soon!</h2>
    </div>
</section>

<?php get_footer(); ?>
