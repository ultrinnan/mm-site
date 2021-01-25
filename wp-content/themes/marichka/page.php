<?php
get_header();
$post = get_post();
setup_postdata($post);    // setting up the post manually

$bg = get_field('background');
if ($bg) {
	$style = 'style="background: url('. $bg .') center center no-repeat; background-size: cover"';
} else {
	$style = '';
}
?>
    <section class="section head page" <?=$style;?>>
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
	    <?php
	    get_template_part( 'partials/tags' );
	    ?>
<!--        <div class="container">-->
<!--            <div class="social_share">-->
<!--                --><?php
//                //get_template_part( 'partials/social-share-page' );
//                ?>
<!--            </div>-->
<!--        </div>-->
    </section>

<?php get_footer(); ?>