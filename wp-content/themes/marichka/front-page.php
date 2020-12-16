<?php
/*
 * Template Name: Front page
 */

get_header();

$hero_image = get_field('hero_picture');
$style = $hero_image ? 'style="background: url(' . $hero_image . ') center no-repeat; background-size: cover;"' : '';

$hero_video = get_field('hero_video');
$certLink = get_field('certificates_link');
?>

<section class="section hero" <?=$style;?>>
    <?php
    if ($hero_video) {
        ?>
        <video autoplay loop muted playsinline id="top_video">
            <source src="<?=$hero_video;?>" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <?php
    }
    ?>
    <div class="container">
        <h1><?=get_the_title();?></h1>
	    <?php if (have_posts()): while (have_posts()): the_post(); ?>
		    <?php the_content(); ?>
	    <?php endwhile; endif; ?>
        <div class="contact_us">
            <a href="#contact_us" class="btn bigger blue">
                <?=pll__('contact_us')?>
            </a>
        </div>
	    <?php wp_nav_menu([
		    'theme_location' => 'hero',
		    'container' => false,
		    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		    'menu_class' => 'hero_menu'
	    ]);?>
        <div id="scroll_down">
            <div class="scroll_icon">
                <div class="arrow">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section soc">
    <div class="container">
        <h2>
            <?=pll__('SOC')?>
        </h2>
        <div class="soc_box">
	        <?php
	        if ( is_active_sidebar( 'frontpage_soc' ) ) {
		        dynamic_sidebar( 'frontpage_soc' );
	        }
	        ?>
        </div>
    </div>
</section>

<section class="section offer_clients">
    <div class="container">
        <h2>
            <?=pll__('Offer to clients');?>
        </h2>
	    <?php
	    $post_args = [
            'post_type' => 'offers',
            'posts_per_page' => -1,
        ];
	    //wp query
	    $post_query = new WP_Query($post_args);
	    ?>
        <div class="offer_box">
            <?php
            while ( $post_query->have_posts() ) :
                $post_query->the_post();
                $post_url = get_the_permalink();
                $thumb = get_the_post_thumbnail_url();
                $title = get_the_title();
                ?>
                <a href="<?=$post_url;?>" class="offer">
                    <span class="offer_img" style="background: url(<?=$thumb;?>) center no-repeat; background-size: contain"></span>
                    <span class="offer_name">
                        <?=$title;?>
                    </span>
                </a>
            <?php
            endwhile;
            ?>
        </div>
        <div class="offer_nav">
            <div class="offer_prev"></div>
            <div class="offer_dots"></div>
            <div class="offer_next"></div>
        </div>
    </div>
</section>

<section class="section security_audit">
    <div class="container">
        <h2>
            <?=pll__('Security audit');?>
        </h2>
	    <?php
	    if ( is_active_sidebar( 'frontpage_audit' ) ) {
		    dynamic_sidebar( 'frontpage_audit' );
	    }
	    ?>
    </div>
</section>

<section class="section feedback">
    <div class="container">
        <h2>
            <?=pll__('Feedbacks');?>
        </h2>
        <div class="review_box">
	        <?php
	        if ( is_active_sidebar( 'frontpage_feedback' ) ) {
		        dynamic_sidebar( 'frontpage_feedback' );
	        }
	        ?>
            <div class="right_link">
		        <?
		        if ( is_active_sidebar( 'feedback_more_link' ) ) {
			        dynamic_sidebar( 'feedback_more_link' );
		        }
		        ?>
            </div>
        </div>
    </div>
</section>

<section class="section certificates">
    <div class="container">
        <h2>
            <?=pll__('Certificates');?>
        </h2>
        <a href="<?=$certLink;?>" class="certificates_box">
            <span class="hex big" title="BSI">
                <span class="certificate_logo bsi"></span>
            </span>
            <span class="hex big" title="CISSP">
                <span class="certificate_logo cissp"></span>
            </span>
            <span class="hex big" title="PECB">
                <span class="certificate_logo pecb"></span>
            </span>
            <span class="hex big" title="ISA">
                <span class="certificate_logo isa"></span>
            </span>
            <span class="hex big" title="CISA">
                <span class="certificate_logo cisa"></span>
            </span>
            <span class="hex big" title="OSCP">
                <span class="certificate_logo oscp"></span>
            </span>
            <span class="hex big" title="CEH">
                <span class="certificate_logo ceh"></span>
            </span>
        </a>
        <div class="cert_nav">
            <div class="cert_prev"></div>
            <div class="cert_dots"></div>
            <div class="cert_next"></div>
        </div>
    </div>
</section>

<section class="section news">
    <div class="container">
        <h2>
            <?=pll__('News')?>
        </h2>
        <div class="news_box">
	        <?php
	        $post_args = [
		        'post_type' => 'post',
		        'posts_per_page' => 3,
	        ];
	        //wp query
	        $post_query = new WP_Query($post_args);
	        while ( $post_query->have_posts() ) :
		        $post_query->the_post();
		        $post_url = get_the_permalink();
		        $thumb = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/img/default_thumb.png';
		        $title = get_the_title();
		        $date = get_the_date('d/m/Y');
		        ?>
                <div class="news front">
                    <div class="preview_description" style="background: url(<?= $thumb; ?>) center no-repeat; background-size: cover">
                        <div class="news_date">
					        <?=$date;?>
                        </div>
                        <div class="news_title">
					        <?= $title; ?>
                        </div>
                        <div class="news_read_more">
                            <a class="btn blue" href="<?= $post_url; ?>">
						        <?=pll__('read_more');?>
                            </a>
                        </div>
                    </div>
                </div>
	        <?php
	        endwhile;
	        ?>
        </div>
        <div class="news_nav">
            <div class="news_prev"></div>
            <div class="news_next"></div>
        </div>
        <div class="contacts_anchor" id="contact_us"></div>
        <div class="right_link" id="contact_us">
	        <?
	        if ( is_active_sidebar( 'news_more_link' ) ) {
		        dynamic_sidebar( 'news_more_link' );
	        }
	        ?>
        </div>
    </div>
</section>

<section class="section contacts">
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
