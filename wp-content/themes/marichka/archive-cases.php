<?php
get_header();

$cases = get_pages('meta_key=_wp_page_template&meta_value=system-cases.php');
if ( ! empty($cases) ) {
	$page = array_shift($cases);
	$title = $page->post_title;
	$content = apply_filters('the_content', $page->post_content );
	$clients_text = get_field('happy_clients_description', $page->ID);
	$clients = get_field('happy_clients', $page->ID) ?? [];
} else {
    die('please create page and select template "System cases"');
}
?>
    <section class="section head cases">
        <h1><?=$title;?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		}
		?>
    </section>

    <section class="section cases">
        <div class="container">
            <?=$content;?>
        </div>
        <div class="container">
            <div class="all_cases_box">
	            <?php
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
                    <div class="case_url">
                        <a class="btn blue" href="/<?=$url;?>">
				            <?=pll__('read_more');?>
                        </a>
                    </div>
                </div>
                <?php
                }
	            ?>
            </div>
        </div>
        <div class="container">
            <?=$clients_text;?>
        </div>
        <div class="container">
            <div class="clients_box">
                <?php
                foreach ($clients as $client) {
                    ?>
                    <a class="client" target="_blank" href="<?=$client['client_url']?>">
                        <img src="<?=$client['client_logo']?>" alt="<?=$client['client_name']?>">
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="container references">
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