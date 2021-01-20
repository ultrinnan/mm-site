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
        <div class="content">
            <h1>Smart electric motorcycles</h1>
            <p>Production of smart electric motorcycles in old-school style with a lot of smart functions like synchronization of data, remote tracking, travel assistant, etc.</p>
            <p>In addition to the production of motorcycles, we have a special service center for electric motorcycles and a special “service bus” that can help you on the road in case of any issue (battery problems, tires, etc.).</p>
            <p>Also, we work in a partnership with different companies to provide the best choice of motorcycle parts and tuning sets.</p>
            <p>If you want to be our partner – please contact us via email <a href="mailto:sergey.fedirko@gmail.com" rel="nofollow">sergey.fedirko@gmail.com</a></p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
