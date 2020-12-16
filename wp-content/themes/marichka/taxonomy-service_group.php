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
    <section class="section head service_group" <?=$style;?>>
        <h1><?php echo single_cat_title( '', false ); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if(function_exists('bcn_display')) {
			bcn_display();
		}
		?>
    </section>

    <section class="section service_group">
        <div class="container">
	        <?=category_description(); ?>

	        <?php
	        if ( is_active_sidebar( 'scanner_link' ) ) {
		        dynamic_sidebar( 'scanner_link' );
	        }
	        ?>
        </div>
    </section>

    <section class="section services_line">
        <div class="container">
            <div class="service_box">
	            <?php
	            $post_args = array(
		            'posts_per_page' => -1,
                    'post_type' => 'services',
                    'orderby' => 'modified',
                    'order'   => 'ASC',
		            'tax_query' => array(
			            array (
				            'taxonomy' => 'service_group',
				            'field' => 'slug',
                            'terms' => $term->slug
			            )
		            ),
	            );
	            //wp query
	            $post_query = new WP_Query($post_args);
	            $i=1;
	            $leftContent = '';
	            $rightContent = '';
	            while ( $post_query->have_posts() ) {
		            $post_query->the_post();
		            $title = get_the_title();
		            $content = get_the_excerpt();
		            $url = get_the_permalink();
		            $icon = get_field('white_logo');
                    if ($i%2 == 0) {
	                    $str = <<<RIGHT
<a href="$url" class="service">
    <span class="service_text">
        <span class="service_title">
            <span>
                $title
            </span>
        </span>
        <span class="service_description">
            $content
        </span>
    </span>
    <span class="hex big">
        <span class="service_icon" style="background: url($icon) center no-repeat; background-size: contain">
        </span>
    </span>
    <span class="line"></span>
</a>
RIGHT;
	                    $rightContent .= $str;
                    } else {
	                    $str = <<<LEFT
<a href="$url" class="service">
    <span class="service_text">
        <span class="service_title">
            <span>
                $title
            </span>
        </span>
        <span class="service_description">
            $content
        </span>
    </span>
    <span class="hex big">
        <span class="service_icon" style="background: url($icon) center no-repeat; background-size: contain">
        </span>
    </span>
    <span class="line"></span>
</a>
LEFT;
	                    $leftContent .= $str;
                    }
                    $i++;
	            }
	            ?>
                <div class="left">
                    <?=$leftContent;?>
                </div>
                <div class="right">
                    <?=$rightContent;?>
                </div>
            </div>
        </div>
    </section>

    <section class="section cases">
        <div class="container">
            <h2>
                <?=pll__('business_cases_title')?>
            </h2>
            <div class="cases_box">
	            <?php
                $services_args = [
                    'posts_per_page' => -1,
                    'post_type' => 'services',
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'service_group',
                            'field' => 'slug',
                            'terms' => $term->slug,
                        )
                    ),
                ];
	            $services_query = new WP_Query($services_args);
	            $services = [];
                while ( $services_query->have_posts() ) {
	                $services_query->the_post();
	                $services[] = get_the_ID();
                }
	            wp_reset_postdata();

	            $post_args = array(
		            'posts_per_page' => -1,
		            'post_type' => 'cases',
		            'meta_query' => array(
			            'relation' => 'OR', // Lets it know that either of the following is acceptable
		            )
	            );

	            for($i = 0; $i < count($services); $i++) {
	                $post_args['meta_query'][] = array(
		                'key'	 	=> 'service',
		                'value'	  	=> $services[$i],
		                'compare' 	=> 'LIKE',
	                );
                }

	            //wp query
	            $post_query = new WP_Query($post_args);
	            if ($post_query->have_posts()) {
		            while ( $post_query->have_posts() ) {
			            $post_query->the_post();
			            $title = get_the_title();
			            $url = get_the_permalink();
			            $exc = get_the_excerpt();
			            ?>
                        <div class="case">
                            <div class="case_title">
					            <?=$title;?>
                            </div>
                            <div class="case_desc">
                                <?=$exc;?>
                            </div>
                            <div class="case_url">
                                <a class="btn blue" href="<?=$url;?>">
						            <?=pll__('read_more');?>
                                </a>
                            </div>
                        </div>
			            <?php
		            }
	            } else {
                    $terms = get_terms( array(
                        'taxonomy' => 'case_group',
                        'hide_empty' => false,
                    ) );
                    foreach ($terms as $term) {
	                    $curLang = pll_current_language();
	                    $prefix = $curLang === 'en' ? '' : $curLang . '/';
	                    $url = $prefix . 'case-group/' . $term->slug;
                        ?>
                        <div class="case">
                            <div class="case_title">
                                <?=$term->name;?>
                            </div>
                            <div class="case_desc">
                                <?=$term->description;?>
                            </div>
                            <div class="case_url">
                                <a class="btn blue" href="/<?=$url;?>">
                                    <?=pll__('read_more');?>
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