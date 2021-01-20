<?php
/* Template Name: Contacts */

get_header();

$bg = get_field('background');
if ($bg) {
	$style = 'style="background: url('. $bg .') center top no-repeat; background-size: cover"';
} else {
	$style = '';
}
?>
    <section class="section head contacts page" <?=$style;?>>
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="section contacts page">
        <div class="container">
            <div class="content">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>