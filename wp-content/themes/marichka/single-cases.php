<?php
get_header();
$term = get_the_ID();
set_query_var( 'term', $term);

$bg = get_field('background');
if ($bg) {
	$style = 'style="background: url('. $bg .') center top no-repeat; background-size: cover"';
} else {
	$style = '';
}
?>
    <section class="section head cases single" <?=$style;?>>
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if(function_exists('bcn_display')) {
			bcn_display();
		}
		?>
    </section>

    <section class="section cases single">
        <div class="container with_sidebar">
            <div class="content article">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
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
				<?= pll__( 'all_cases' ) ?>
            </h2>
            <div class="cases_box">
				<?php
				$post_args = array(
					'posts_per_page' => '10',
					'post_type'      => 'cases',
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
        </div>
    </section>

<?php get_footer(); ?>