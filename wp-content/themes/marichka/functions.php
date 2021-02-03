<?php
add_filter('widget_text','do_shortcode');

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support( 'html5', [ 'search-form', 'script', 'style' ] );

//security hooks
require 'admin/security_hooks.php';
//dashboard customization
require 'admin/admin_customizations.php';

// Common scripts and styles
function f_scripts_styles()
{
    // Connect styles
//	wp_enqueue_style('slick_css', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css");
//	wp_enqueue_style('slick_css_theme', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css");
	wp_enqueue_style('f_style', get_template_directory_uri() . '/css/main.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

//	wp_enqueue_script('slick_js', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array('jquery'), '1.0', true);
	wp_enqueue_script('f_scripts', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '1.0', true);
}
// Create action where we connected scripts and styles in function f_scripts_styles
add_action('wp_enqueue_scripts', 'f_scripts_styles', 1);

//custom locations for menus
function f_register_menus() {
    register_nav_menu( 'header', __( 'Header menu', 'theme-slug' ) );
    register_nav_menu( 'footer', __( 'Footer menu', 'theme-slug' ) );
}
add_action( 'after_setup_theme', 'f_register_menus' );

//remove titles for all widgets
add_filter('widget_title','my_widget_title');
function my_widget_title($t)
{
	return null;
}

// create widget for languages
register_sidebar(array(
	'name' => 'Language switcher',
	'id' => 'languages',
	'before_widget' => '',
	'after_widget' => '',
));
// create widget 404 page
register_sidebar(array(
	'name' => 'Page 404 content',
	'id' => 'page404',
	'before_widget' => '',
	'after_widget' => '',
));
// create widget for cookie
register_sidebar(array(
	'name' => 'Cookie consent',
	'id' => 'cookie_consent',
	'before_widget' => '',
	'after_widget' => '',
));

//theme translations
if (function_exists('pll_register_string')) {
	pll_register_string( '404_header', '404_header', 'template', false );
}

//Feedback custom post type
function feedback_post_type() {
    register_post_type( 'feedbacks',
        array(
            'labels' => array(
                'name' => __( 'Feedback' ),
                'singular_name' => __( 'Feedback' )
            ),
            'menu_icon' => 'dashicons-testimonial',
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'feedback'),
            'supports'            => array( 'title', 'editor', 'thumbnail'),
            'exclude_from_search' => true,
            'taxonomies'  => array(),
            'hierarchical'        => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'can_export'          => true,
        )
    );
}
add_action( 'init', 'feedback_post_type' );

add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    } elseif ( is_tax() ) { //for custom post types
        $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
});

//function cookieAccept() {
//	$cookie_name = "cookieAccepted";
//	$cookie_value = "Marichka-motorS rulZ!";
//
//	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//	} elseif (isset($_SERVER['REMOTE_ADDR'])) {
//		$ip = $_SERVER['REMOTE_ADDR'];
//	} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
//		$ip = $_SERVER['HTTP_CLIENT_IP'];
//	} else {
//		$ip = 'CANNOT_IDENTIFY_IP';
//	}
//
//	$logsDir = get_template_directory() . '/logs';
//	$filePath = $logsDir . '/cookies_acceptances.txt';
//
//	if (!is_dir(get_template_directory() . '/logs')) {
//		mkdir(get_template_directory() . '/logs');
//	}
//	$log = 'Cookie accepted on ' . date('Y-m-d h:i') . ' from IP: ' . $ip . "\n";
//
//	$logFile = fopen($filePath, 'a') or die("Can't create file");
//
//	if (fwrite($logFile, $log)) {
//		setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
//	}
//	fclose($logFile);
//
//	wp_die();
//}
//add_action('wp_ajax_cookieAccept', 'cookieAccept');
//add_action('wp_ajax_nopriv_cookieAccept', 'cookieAccept');