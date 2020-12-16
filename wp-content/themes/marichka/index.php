<?php
get_header();
$post = get_post();
setup_postdata($post);    // setting up the post manually
?>
    <section class="section head news index">
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if(function_exists('bcn_display')) {
			bcn_display();
		}
		?>
    </section>

    <section class="section news single index">
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