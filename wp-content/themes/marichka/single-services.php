<?php
get_header();
$term = get_queried_object();
set_query_var( 'term', $term);

$bg = get_field('background');
if ($bg) {
	$style = 'style="background: url('. $bg .') center top no-repeat; background-size: cover"';
} else {
	$style = '';
}
?>
    <section class="section head services single" <?=$style;?>>
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		}
		?>
    </section>

    <section class="section services single">
        <div class="container with_sidebar">
            <div class="content article">
				<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
            </div>
			<?php
			get_template_part( 'partials/related_services' );
			?>
        </div>
		<?php
		get_template_part( 'partials/tags' );
		?>
    </section>

    <section class="section cases">
        <div class="container">
            <h2>
				<?= pll__( 'business_cases_title' ) ?>
            </h2>
            <div class="cases_box">
				<?php
				$post_args = array(
					'posts_per_page' => - 1,
					'post_type'      => 'cases',
					'meta_key'		=> 'service',
					'meta_value'	=> get_the_ID(),
                    'meta_compare' => 'LIKE'
				);
				//wp query
				$post_query = new WP_Query( $post_args );
				if ( $post_query->have_posts() ) {
					while ( $post_query->have_posts() ) {
						$post_query->the_post();
						$title = get_the_title();
						$url   = get_the_permalink();
						$exc   = get_the_excerpt();
						?>
                        <div class="case">
                            <div class="case_title">
								<?= $title; ?>
                            </div>
                            <div class="case_desc">
								<?= $exc; ?>
                            </div>
                            <div class="case_url">
                                <a class="btn blue" href="<?= $url; ?>">
									<?= pll__( 'read_more' ); ?>
                                </a>
                            </div>
                        </div>
						<?php
					}
				} else {
					$terms = get_terms( array(
						'taxonomy'   => 'case_group',
						'hide_empty' => false,
					) );
					foreach ( $terms as $term ) {
						$curLang = pll_current_language();
						$prefix = $curLang === 'en' ? '' : $curLang . '/';
						$url = $prefix . 'case-group/' . $term->slug;
						?>
                        <div class="case">
                            <div class="case_title">
								<?= $term->name; ?>
                            </div>
                            <div class="case_desc">
								<?= $term->description; ?>
                            </div>
                            <div class="case_url">
                                <a class="btn blue" href="/<?=$url;?>">
									<?= pll__( 'read_more' ); ?>
                                </a>
                            </div>
                        </div>
						<?php
					}
				}
				?>
            </div>
            <div class="cases_nav">
                <div class="cases_prev"></div>
                <div class="cases_all">
                    <a href="/cases">
				        <?=pll__('watch_all')?>
                    </a>
                </div>
                <div class="cases_next"></div>
            </div>
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
						<?= pll__( 'thank_you' ) ?>
                    </div>
                    <div class="thanks_text">
						<?= pll__( 'email_sent' ) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>