<?php
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php 
          if (isset($_SERVER['HTTP_USER_AGENT']) &&
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        header('X-UA-Compatible: IE=edge,chrome=1');
    ?>
    <title><?php wp_title(); ?></title>
    <link rel="shortcut icon" type="image/ico" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/x-icon.ico" />
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/apple-touch-icon-180x180.png" />
    <?php wp_head(); ?>
</head>

<body>
    <div class="modal_box hidden">
        <div class="modal_main">
            <div class="btn blue close_modal"></div>
            <?php
            if ( is_active_sidebar( 'contacts_modal' ) ) {
	            dynamic_sidebar( 'contacts_modal' );
            }
            ?>
        </div>
        <div class="modal_thanks hidden">
            <div class="btn blue close_modal"></div>
            <div class="modal_check_success"></div>
            <div class="thanks_header">
		        <?=pll__('thank_you')?>
            </div>
            <div class="thanks_text">
		        <?=pll__('email_sent')?>
            </div>
        </div>
    </div>
    <header class="header <?=is_front_page()?'frontpage':'';?>">
        <div class="header_row">
            <div class="header_logo">
                <a href="<?=home_url();?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_big_tcs_white.png" alt="logo" />
                </a>
            </div>
            <div class="header_content">
                <div class="header_search">
		            <?php get_search_form(); ?>
                </div>
                <div class="header_contacts">
                    <?
                    if ( is_active_sidebar( 'header_contacts' ) ) {
	                    dynamic_sidebar( 'header_contacts' );
                    }
                    ?>
                </div>
                <div class="header_phone">
	                <?
	                if ( is_active_sidebar( 'header_phone' ) ) {
		                dynamic_sidebar( 'header_phone' );
	                }
	                ?>
                </div>
                <div class="header_languages">
                    <div class="languages_icon"></div>
                    <ul class="languages codes">
			            <?php pll_the_languages(['display_names_as' => 'slug',]);?>
                    </ul>
                </div>
                <div class="dont_panic">
                    <button class="btn red"><?=pll__('under_attack')?></button>
                </div>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="header_menu">
            <div class="mobile_menu_header">
                <a href="<?=home_url();?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_big_tcs.png" alt="logo" />
                </a>
            </div>
	        <?php wp_nav_menu([
		        'theme_location' => 'header',
		        'container' => false,
		        'items_wrap' => '<ul id="%1$s" class="%2$s"><div id="close_menu" class="btn blue"></div>%3$s</ul>',
		        'menu_class' => 'menu_list'
	        ]);?>
            <div class="mobile_menu_footer">
                <div class="dont_panic">
                    <button class="btn red"><?=pll__('under_attack')?></button>
                </div>
                <div class="header_languages">
                    <div class="languages_icon"></div>
                    <ul class="languages codes">
			            <?php pll_the_languages(['display_names_as' => 'slug',]);?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
