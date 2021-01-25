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
            'menu_class' => 'footer_menu'
        ]);?>
    </div>
    <div class="container">
        <div class="copyright">
            <div>
                <?=date('Y');?> &copy; Marichka Motors - Smart Electric Motorcycles
            </div>
            <div>
                Created by <a target="_blank" class="footer_author" href="https://fedirko.pro">FEDIRKO.PRO</a>
            </div>
        </div>
        <div class="footer_social">
            <?php
            $social = get_option('social_options');

            if ($social) {
                foreach ($social as $key => $value) {
                    if ($value) {
                        ?>
                            <a class="social <?=$key?>" href="<?=$value?>" target="_blank" title="<?=$key?>"></a>
                        <?php
                    }
                }
            }
            ?>
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

<?php wp_footer(); ?>

<?php
if (defined('WP_DEBUG') && WP_DEBUG === true) {
    //snippet for brpwsersync from gulp
    ?>
    <script id="__bs_script__">//<![CDATA[
        document.write("<script async src='http://HOST:81/browser-sync/browser-sync-client.js?v=2.26.13'><\/script>".replace("HOST", location.hostname));
        //]]></script>
    <?php
}
?>

</body>
</html>
