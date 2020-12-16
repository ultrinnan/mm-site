<?php
$options = get_option('general_options');

$email = isset($options['email']) ? $options['email'] : '';
?>

</main>
<footer class="section-footer">
    <div class="column left">
        <?php wp_nav_menu([
            'theme_location' => 'footer_left',
            'container' => false,
        ]);?>
        <ul class="languages">
            <li class="globe"></li>
		    <?php pll_the_languages();?>
        </ul>

        <div class="copyright">
            &copy; H-X Technologies
        </div>
    </div>
    <div class="column center">
	    <?php wp_nav_menu([
		    'theme_location' => 'footer_center',
		    'container' => false,
	    ]);?>
    </div>
    <div class="column right">
	    <?php get_template_part( 'partials/footer_contacts' );?>

        <?php wp_nav_menu([
		    'theme_location' => 'footer_right',
		    'container' => false,
            'menu_class' => 'right_menu'
	    ]);?>

	    <?php get_template_part( 'partials/footer_social' );?>
    </div>

    <a target="_blank" class="footer_author" href="https://fedirko.pro" title="created by FEDIRKO.PRO"></a>
</footer>

<?php
if(!isset($_COOKIE['cookieAccepted'])) {
    ?>
    <div class="cookie">
	    <?php
	    if ( is_active_sidebar( 'cookie_consent' ) ) {
		    dynamic_sidebar( 'cookie_consent' );
	    }
	    ?>
    </div>
	<?php
}
?>
<html>
<body>

<?php wp_footer(); ?>

</body>
</html>
