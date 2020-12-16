<?php
/* Template Name: Page with Contact form */

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
    <section class="section head news page" <?=$style;?>>
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if(function_exists('bcn_display')) {
			bcn_display();
		}
		?>
    </section>

    <section class="section news single page">
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

    <section class="section contacts">
        <div class="contacts_anchor" id="contact_us"></div>
        <div class="container">
            <div class="contacts_box">
                <div class="modal_main">
                    <?php
                    if ( is_active_sidebar( 'frontpage_contact' ) ) {
                        dynamic_sidebar( 'frontpage_contact' );
                    }
                    ?>
                </div>
                <div class="modal_thanks hidden">
                    <div class="modal_check_success"></div>
                    <div class="thanks_header">
                        <?=pll__('thank_you')?>
                    </div>
                    <div class="thanks_text">
                        <?=pll__('email_sent')?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>