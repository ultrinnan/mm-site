<?php
get_header();

$services = get_pages('meta_key=_wp_page_template&meta_value=system-offers.php');
if ( ! empty($services) ) {
	$page = array_shift($services);
	$title = $page->post_title;
	$content = apply_filters('the_content', $page->post_content );
} else {
    die('please create page and select template "System Offers"');
}
?>
    <section class="section head offers">
        <h1><?=$title;?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		}
		?>
    </section>

    <section class="section offers">
        <div class="container">
            <?=$content;?>
        </div>
        <div class="container">
            <div class="offers_box">
	            <?php
	            $post_args = array(
		            'posts_per_page' => -1,
		            'post_type' => 'offers',
	            );
	            //wp query
	            $post_query = new WP_Query($post_args);
	            while ( $post_query->have_posts() ) {
		            $post_query->the_post();
		            $title = get_the_title();
		            $content = get_the_excerpt();
		            $url = get_the_permalink();
		            ?>
                    <div class="offer">
                        <div class="offer_title">
				            <?=$title;?>
                        </div>
                        <div class="offer_desc">
				            <?=$content;?>
                        </div>
                        <div class="offer_url">
                            <a class="btn blue" href="<?=$url;?>">
					            <?=pll__('read_more');?>
                            </a>
                        </div>
                    </div>
		            <?php
	            }
	            ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>