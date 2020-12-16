<?php
/* Template Name: References */

get_header();

$bg = get_field('background');
if ($bg) {
	$style = 'style="background: url('. $bg .') center top no-repeat; background-size: cover"';
} else {
	$style = '';
}
?>
    <section class="section head references" <?=$style;?>>
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		}
		?>
    </section>

    <section class="section references">
        <div class="container">
            <h2>
		        <?=pll__('clutch_references');?>
            </h2>
            <div class="review_box">
	            <?php
	            if ( is_active_sidebar( 'references' ) ) {
		            dynamic_sidebar( 'references' );
	            }
	            ?>
            </div>
        </div>
        <div class="container">
            <h2>
                <?=pll__('customers_feedback')?>
            </h2>
            <div class="feedbacks">
	            <?php
	            $post_args = [
		            'post_type' => 'feedbacks',
		            'posts_per_page' => -1,
	            ];
	            //wp query
	            $post_query = new WP_Query($post_args);
	            ?>
                <div class="feedback_box">
		            <?php
		            while ( $post_query->have_posts() ) :
			            $post_query->the_post();
			            $name = get_field('customer_contact_name');
			            $position = get_field('customer_contact_position');
			            $text = get_the_content();
			            ?>
                        <div class="feedback_item">
                            <div class="feedback_text">
                                <?=$text;?>
                            </div>
                            <div class="feedback_person">
                                <?=$name;?>
                            </div>
                            <div class="feedback_position">
                                <?=$position;?>
                            </div>
                        </div>
		            <?php
		            endwhile;
		            ?>
                </div>
                <div class="feedback_nav">
                    <div class="feedback_prev"></div>
                    <div class="feedback_next"></div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>