<?php
get_header();

// get the current taxonomy term
$term = get_queried_object();
set_query_var( 'term', $term);

$bg = get_field('group_background', $term);
if ($bg) {
	$style = 'style="background: url('. $bg .') center top no-repeat; background-size: cover"';
} else {
	$style = '';
}
?>
    <section class="section head case_group" <?=$style;?>>
        <h1><?php echo single_cat_title( '', false ); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if(function_exists('bcn_display')) {
			bcn_display();
		}
		?>
    </section>

    <section class="section case_group">
        <div class="container with_sidebar">
            <div class="case_group_box">
				<?php
				$post_args = array(
					'posts_per_page' => -1,
					'post_type' => 'cases',
					'tax_query' => array(
						array (
							'taxonomy' => 'case_group',
							'field' => 'slug',
							'terms' => $term->slug,
						)
					),
				);
				//wp query
				$post_query = new WP_Query($post_args);
				$i = 0;
				while ( $post_query->have_posts() ) {
					$post_query->the_post();
					$title = get_the_title();
					$content = get_the_content();
					?>
                    <div class="case">
                        <div class="case_title">
                            <div class="hex case_number">
                                <span>
                                    <?=$i+1;?>
                                </span>
                            </div>
                            <div>
                                <?=$title;?>
                            </div>
                        </div>
                        <div class="case_description">
                            <?=$content;?>
                            <div class="order_wrap">
                                <a href="#contact_us" class="btn blue order_case" data-case="<?=$title;?>">
		                            <?=pll__('order')?>
                                </a>
                            </div>
                        </div>
                    </div>
					<?php
					$i ++;
				}
				?>
            </div>
            <?php
                get_template_part( 'partials/related_services');
            ?>
        </div>
    </section>

    <section class="section contacts" id="contact_us">
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