<?php
get_header();
$term = get_the_ID();
set_query_var( 'term', $term);

$bg = get_field('background', $term);
if ($bg) {
	$style = 'style="background: url('. $bg .') center top no-repeat; background-size: cover"';
} else {
	$style = '';
}
?>
    <section class="section head offers single" <?=$style;?>>
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if(function_exists('bcn_display')) {
			bcn_display();
		}
		?>
    </section>

    <section class="section offers single">
        <div class="container">
            <div class="content article">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
	    <?php
	    get_template_part( 'partials/tags' );
	    ?>
    </section>

    <section class="section cases offers">
        <div class="container_margin">
            <div class="services_box">
				<?php
                $services = get_field('related_services');

				foreach ($services as $service) {
                    $title = get_the_title($service);
                    $url   = get_the_permalink($service);
                    $exc   = get_the_excerpt($service);
                    $img = get_the_post_thumbnail_url($service);
                    ?>
                    <a href="<?=$url;?>" class="service">
                        <span class="service_logo">
                            <img src="<?=$img;?>" alt="<?=$title;?>">
                        </span>
                        <span class="service_text">
                            <span class="service_title">
                                <span>
                                    <?=$title;?>
                                </span>
                            </span>
                            <span class="service_description">
                                <?=$exc;?>
                            </span>
                        </span>
                    </a>
                    <?php
                }
				?>
            </div>
        </div>

        <?php $text_block = get_field('text_block1'); ?>
        <div class="container_margin <?= empty($text_block) ? 'hidden' : '' ?> ">
            <div class="content article">
                <?=$text_block; ?>
            </div>
        </div>

        <?php $offer_accordions = get_field('accordion1') ?? []; ?>
        <div class="container_margin <?= empty($offer_accordions) ? 'hidden' : '' ?>">
            <div class="offer_accordion1_group_box">
                <?php                
                foreach ($offer_accordions as $offer_accordion_num=>$offer_accordion) {
                    $offer_accordion_title = $offer_accordion['accordion1_title'];
                    $offer_accordion_description = $offer_accordion['accordion1_description'];
                    ?>
                    <div class="offer_accordion1">
                        <div class="offer_accordion1_title">
                            <div class="hex offer_accordion1_number">
                                <span>
                                    <?=$offer_accordion_num+1;?>
                                </span>
                            </div>
                            <div>
                                <?=$offer_accordion_title;?>
                            </div>
                        </div>
                        <div class="offer_accordion1_description">
                            <?=$offer_accordion_description;?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php $text_block = get_field('text_block2'); ?>
        <div class="container_margin <?= empty($text_block) ? 'hidden' : '' ?> ">
            <div class="content article">
                <?=$text_block; ?>
            </div>
        </div>

        <?php $offer_accordions = get_field('accordion2') ?? []; ?>
        <div class="container_margin <?= empty($offer_accordions) ? 'hidden' : '' ?>">
            <div class="offer_accordion2_group_box">
                <?php                
                foreach ($offer_accordions as $offer_accordion_num=>$offer_accordion) {
                    $offer_accordion_title = $offer_accordion['accordion2_title'];
                    $offer_accordion_description = $offer_accordion['accordion2_description'];
                    ?>
                    <div class="offer_accordion2">
                        <div class="offer_accordion2_title">
                            <div class="hex offer_accordion2_number">
                                <span>
                                    <?=$offer_accordion_num+1;?>
                                </span>
                            </div>
                            <div>
                                <?=$offer_accordion_title;?>
                            </div>
                        </div>
                        <div class="offer_accordion2_description">
                            <?=$offer_accordion_description;?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php $text_block = get_field('text_block3'); ?>
        <div class="container_margin <?= empty($text_block) ? 'hidden' : '' ?> ">
            <div class="content article">
                <?=$text_block; ?>
            </div>
        </div>

        <?php $offer_accordions = get_field('accordion3') ?? []; ?>
        <div class="container_margin <?= empty($offer_accordions) ? 'hidden' : '' ?>">
            <div class="offer_accordion3_group_box">
                <?php                
                foreach ($offer_accordions as $offer_accordion_num=>$offer_accordion) {
                    $offer_accordion_title = $offer_accordion['accordion3_title'];
                    $offer_accordion_description = $offer_accordion['accordion3_description'];
                    ?>
                    <div class="offer_accordion3">
                        <div class="offer_accordion3_title">
                            <div class="hex offer_accordion3_number">
                                <span>
                                    <?=$offer_accordion_num+1;?>
                                </span>
                            </div>
                            <div>
                                <?=$offer_accordion_title;?>
                            </div>
                        </div>
                        <div class="offer_accordion3_description">
                            <?=$offer_accordion_description;?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php $text_block = get_field('text_block4'); ?>
        <div class="container_margin <?= empty($text_block) ? 'hidden' : '' ?> ">
            <div class="content article">
                <?=$text_block; ?>
            </div>
        </div>

        <div class="container">
            <h2>
				<?=pll__('all_cases_for_you')?>
            </h2>
            <div class="cases_box">
				<?php

                $relatedCases = get_field('related_cases');

				$casesList = [];
				foreach ($relatedCases as $case) {
					$casesList[] = $case->ID;
				}

				$post_args = array(
					'posts_per_page' => -1,
					'post_type' => 'cases',
                    'post__in' => $casesList,
				);

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
            <a class="all_news" href="<?=get_field('all_cases_link') ?? '/cases'?>">
                <?=pll__('watch_all_cases')?>
            </a>
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