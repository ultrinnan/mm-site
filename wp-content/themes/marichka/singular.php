<?php
get_header();

$bg = get_field('background');
if ($bg) {
	$style = 'style="background: url('. $bg .') center top no-repeat; background-size: cover"';
} else {
	$style = '';
}
?>
    <section class="section head news single" <?=$style;?>>
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if(function_exists('bcn_display')) {
			bcn_display();
		}
		?>
    </section>

    <section class="section news single">
        <div class="container">
            <div class="social_share">
				<?php
				get_template_part( 'partials/social-share-page' );
				?>
            </div>
            <div class="content">
                <div class="date">
					<?php echo get_the_date('d/m/Y'); ?>
                </div>
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