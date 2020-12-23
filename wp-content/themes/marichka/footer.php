<?php
$options = get_option('general_options');

$email = isset($options['email']) ? $options['email'] : '';
?>

</main>
<footer>
    <div class="container">
        <?php wp_nav_menu([
            'theme_location' => 'footer',
            'container' => false,
            'menu_class' => 'right_menu'
        ]);?>
    </div>
    <div class="container">
        <div class="copyright">
            <div>
                &copy; Marichka Motors - Smart Electric Motorcycles
            </div>
            <div>
                Created by <a target="_blank" class="footer_author" href="https://fedirko.pro">FEDIRKO.PRO</a>
            </div>
        </div>
        <div class="footer_social">
            <?php get_template_part( 'partials/footer_social' );?>
        </div>
    </div>
</footer>

<?php
if(!isset($_COOKIE['cookieAccepted']) && is_active_sidebar( 'cookie_consent' ) ) {
    ?>
    <div class="cookie">
    <?php
        dynamic_sidebar( 'cookie_consent' );
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
