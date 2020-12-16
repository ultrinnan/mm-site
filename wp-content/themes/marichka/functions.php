<?php
add_filter('widget_text','do_shortcode');

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support( 'html5', array( 'search-form' ) );

//security hooks
require 'admin/security_hooks.php';
//dashboard customization
require 'admin/admin_customizations.php';

// Common scripts and styles
function f_scripts_styles()
{
    // Connect styles
	wp_enqueue_style('slick_css', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css");
	wp_enqueue_style('slick_css_theme', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css");
	wp_enqueue_style('f_style', get_template_directory_uri() . '/css/main.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

	wp_enqueue_script('slick_js', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array('jquery'), '1.0', true);
	wp_enqueue_script('f_scripts', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '1.0', true);
}
// Create action where we connected scripts and styles in function f_scripts_styles
add_action('wp_enqueue_scripts', 'f_scripts_styles', 1);

//custom locations for menus
function f_register_menus() {
    register_nav_menu( 'header', __( 'Header menu', 'theme-slug' ) );
    register_nav_menu( 'hero', __( 'Hero menu', 'theme-slug' ) );
    register_nav_menu( 'footer_left', __( 'Footer left column', 'theme-slug' ) );
    register_nav_menu( 'footer_center', __( 'Footer center menu', 'theme-slug' ) );
    register_nav_menu( 'footer_right', __( 'Footer right menu', 'theme-slug' ) );
}
add_action( 'after_setup_theme', 'f_register_menus' );

//remove titles for all widgets
add_filter('widget_title','my_widget_title');
function my_widget_title($t)
{
	return null;
}

// create widget for Home page
register_sidebar(array(
	'name' => 'Header modal form',
	'id' => 'contacts_modal',
	'before_widget' => '',
	'after_widget' => '',
));
// create widget for Frontpage SOC section
register_sidebar(array(
	'name' => 'Frontpage SOC section',
	'id' => 'frontpage_soc',
	'before_widget' => '',
	'after_widget' => '',
));
// create widget for Frontpage audit section
register_sidebar(array(
	'name' => 'Frontpage audit section',
	'id' => 'frontpage_audit',
	'before_widget' => '',
	'after_widget' => '',
));
// create widget for Frontpage feedback section
register_sidebar(array(
	'name' => 'Frontpage feedback section',
	'id' => 'frontpage_feedback',
	'before_widget' => '',
	'after_widget' => '',
));
// create widget for References page
register_sidebar(array(
	'name' => 'References page',
	'id' => 'references',
	'before_widget' => '',
	'after_widget' => '',
));
// create widget for Frontpage contact form
register_sidebar(array(
	'name' => 'Frontpage contact form',
	'id' => 'frontpage_contact',
	'before_widget' => '',
	'after_widget' => '',
));

// create widget for home page contacts url
register_sidebar(array(
	'name' => 'Header contacts url',
	'id' => 'header_contacts',
	'before_widget' => '',
	'after_widget' => '',
));
// create widget for header phone
register_sidebar(array(
	'name' => 'Header phone',
	'id' => 'header_phone',
	'before_widget' => '',
	'after_widget' => '',
));

// create widget for news more link
register_sidebar(array(
	'name' => 'News more link',
	'id' => 'news_more_link',
	'before_widget' => '',
	'after_widget' => '',
));
// create widget for feedback more link
register_sidebar(array(
	'name' => 'Feedback more link',
	'id' => 'feedback_more_link',
	'before_widget' => '',
	'after_widget' => '',
));

// create widgets for footer contacts
register_sidebar(array(
	'name' => 'Footer phone',
	'id' => 'footer_phone',
	'before_widget' => '',
	'after_widget' => '',
));
register_sidebar(array(
	'name' => 'Footer email',
	'id' => 'footer_email',
	'before_widget' => '',
	'after_widget' => '',
));
register_sidebar(array(
	'name' => 'Footer address 1',
	'id' => 'footer_address1',
	'before_widget' => '',
	'after_widget' => '',
));
register_sidebar(array(
	'name' => 'Footer address 2',
	'id' => 'footer_address2',
	'before_widget' => '',
	'after_widget' => '',
));
register_sidebar(array(
	'name' => 'Footer Clutch url',
	'id' => 'footer_clutch',
	'before_widget' => '',
	'after_widget' => '',
));
register_sidebar(array(
	'name' => 'Page 404 text',
	'id' => 'page404',
	'before_widget' => '',
	'after_widget' => '',
));
register_sidebar(array(
	'name' => 'Link to scanner',
	'id' => 'scanner_link',
	'before_widget' => '',
	'after_widget' => '',
));
register_sidebar(array(
	'name' => 'Cookie consent',
	'id' => 'cookie_consent',
	'before_widget' => '',
	'after_widget' => '',
));

//theme translations
pll_register_string( 'services_header', 'services', 'template', false );
pll_register_string( 'search_results', 'search_results', 'template', false );
pll_register_string( 'nothing_found', 'nothing_found', 'template', false );
pll_register_string( 'read_more', 'read_more', 'template', false );
pll_register_string( 'watch_all', 'watch_all', 'template', false );
pll_register_string( 'Previous', 'Previous', 'pagination', false );
pll_register_string( 'Next', 'Next', 'pagination', false );
pll_register_string( 'latest_news', 'latest_news', 'template', false );
pll_register_string( 'contact_us', 'contact_us', 'template', false );
pll_register_string( 'News', 'News', 'section title', false );
pll_register_string( 'SOC', 'SOC', 'section title', false );
pll_register_string( 'Offer to clients', 'Offer to clients', 'section title', false );
pll_register_string( 'Security audit', 'Security audit', 'section title', false );
pll_register_string( 'Feedbacks', 'Feedbacks', 'section title', false );
pll_register_string( 'Certificates', 'Certificates', 'section title', false );
pll_register_string( 'under_attack', 'under_attack', 'template', false );
pll_register_string( 'thank_you', 'thank_you', 'template', false );
pll_register_string( 'email_sent', 'email_sent', 'template', false );
pll_register_string( '404_header', '404_header', 'template', false );
pll_register_string( 'clutch_references', 'clutch_references', 'template', false );
pll_register_string( 'customers_feedback', 'customers_feedback', 'template', false );
pll_register_string( 'our_differences', 'our_differences', 'template', false );
pll_register_string( 'our_team', 'our_team', 'template', false );
pll_register_string( 'discuss_partnership', 'discuss_partnership', 'template', false );
pll_register_string( 'partnership_pros', 'partnership_pros', 'template', false );
pll_register_string( 'your_clients_problems', 'your_clients_problems', 'template', false );
pll_register_string( 'related_services', 'related_services', 'template', false );
pll_register_string( 'you_may_be_interesting', 'you_may_be_interesting', 'template', false );
pll_register_string( 'order', 'order', 'template', false );
pll_register_string( 'business_cases_title', 'business_cases_title', 'template', false );
pll_register_string( 'check_price', 'check_price', 'template', false );
pll_register_string( 'get_consultation', 'get_consultation', 'template', false );
pll_register_string( 'all_cases', 'all_cases', 'template', false );
pll_register_string( 'all_cases_for_you', 'all_cases_for_you', 'template', false );
pll_register_string( 'watch_all_cases', 'watch_all_cases', 'template', false );

//Services custom post type
function services_post_type() {
    register_post_type( 'services',
        array(
            'labels' => array(
                'name' => __( 'Services' ),
                'singular_name' => __( 'Service' )
            ),
            'menu_icon' => 'dashicons-text-page',
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'services'),
            'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail'),
            'exclude_from_search' => false,
            'taxonomies'  => array('post_tag', 'service_group'),
            'hierarchical'        => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'can_export'          => true,
        )
    );
}
add_action( 'init', 'services_post_type' );

//register taxonomy for services
function services_taxonomy() {
	register_taxonomy(
		'service_group',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'services',             // post type name or array?
		array(
			'hierarchical' => true,
			'label' => 'Service groups', // display name
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'service-group',    // This controls the base slug that will display before each term
				'with_front' => false  // Don't display the category base before
			)
		)
	);
}
add_action( 'init', 'services_taxonomy');

//Cases custom post type
function cases_post_type() {
    register_post_type( 'cases',
        array(
            'labels' => array(
                'name' => __('Cases'),
                'singular_name' => __( 'Case' )
            ),
            'menu_icon' => 'dashicons-portfolio',
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'cases'),
            'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail'),
            'exclude_from_search' => false,
            'taxonomies'  => array('post_tag', 'case_group'),
            'hierarchical'        => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'can_export'          => true,
        )
    );
}
add_action( 'init', 'cases_post_type' );

//register taxonomy for cases
function cases_taxonomy() {
	register_taxonomy(
		'case_group',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'cases',             // post type name or array?
		array(
			'hierarchical' => true,
			'label' => 'Case groups', // display name
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'case-group',    // This controls the base slug that will display before each term
				'with_front' => false  // Don't display the category base before
			)
		)
	);
}
add_action( 'init', 'cases_taxonomy');

//Feedback custom post type
function feedback_post_type() {
    register_post_type( 'feedbacks',
        array(
            'labels' => array(
                'name' => __( 'Feedbacks' ),
                'singular_name' => __( 'Feedback' )
            ),
            'menu_icon' => 'dashicons-testimonial',
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'feedbacks'),
            'supports'            => array( 'title', 'editor', /*'excerpt', 'thumbnail'*/),
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

//Industries custom post type
function industries_post_type() {
    register_post_type( 'industries',
        array(
            'labels' => array(
                'name' => __( 'Industries' ),
                'singular_name' => __( 'Industry' )
            ),
            'menu_icon' => 'dashicons-book',
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'industries'),
            'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail'),
            'exclude_from_search' => false,
            'taxonomies'  => array('post_tag'),
            'hierarchical'        => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'can_export'          => true,
        )
    );
}
add_action( 'init', 'industries_post_type' );

//Offers custom post type
function offers_post_type() {
    register_post_type( 'offers',
        array(
            'labels' => array(
                'name' => __( 'Offers' ),
                'singular_name' => __( 'Offer' )
            ),
            'menu_icon' => 'dashicons-products',
            'public' => true,
            'has_archive' => false, //change it to have archive meta-page
            'rewrite' => array('slug' => 'offers'),
            'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail'),
            'exclude_from_search' => false,
            'taxonomies'  => array('post_tag'),
            'hierarchical'        => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'can_export'          => true,
        )
    );
}
add_action( 'init', 'offers_post_type' );

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

function cookieAccept() {
	$cookie_name = "cookieAccepted";
	$cookie_value = "H-Marichka rulZ!";

	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif (isset($_SERVER['REMOTE_ADDR'])) {
		$ip = $_SERVER['REMOTE_ADDR'];
	} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} else {
		$ip = 'CANNOT_IDENTIFY_IP';
	}

	$logsDir = get_template_directory() . '/logs';
	$filePath = $logsDir . '/cookies_acceptances.txt';

	if (!is_dir(get_template_directory() . '/logs')) {
		mkdir(get_template_directory() . '/logs');
	}
	$log = 'Cookie accepted on ' . date('Y-m-d h:i') . ' from IP: ' . $ip . "\n";

	$logFile = fopen($filePath, 'a') or die("Can't create file");

	if (fwrite($logFile, $log)) {
		setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
	}
	fclose($logFile);

	wp_die();
}
add_action('wp_ajax_cookieAccept', 'cookieAccept');
add_action('wp_ajax_nopriv_cookieAccept', 'cookieAccept');