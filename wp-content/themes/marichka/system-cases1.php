<?php
/* Template Name: System Cases1 */

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