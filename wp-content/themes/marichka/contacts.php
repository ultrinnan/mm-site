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
    <section class="section head contact page" <?=$style;?>>
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if(function_exists('bcn_display')) {
			bcn_display();
		}
		?>
    </section>

    <section class="section contact page">
        <div class="container">
            <div class="content">
                <div class="article">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
                </div>
            </div>
        </div>
		<?php
		get_template_part( 'partials/tags' );
		?>
    </section>

<?php get_footer(); ?>