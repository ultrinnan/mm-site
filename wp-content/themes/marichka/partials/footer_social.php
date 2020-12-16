<?php
$social = get_option('social_options');

if ($social) {
	echo '<div class="social_box">';
    foreach ($social as $key => $value) {
        if ($value) {
            ?>
                <div class="hex">
                    <a class="social <?=$key?>" href="<?=$value?>" target="_blank" title="<?=$key?>"> </a>
                </div>
            <?php
        }
    }
	if ( is_active_sidebar( 'footer_clutch' ) ) {
		dynamic_sidebar( 'footer_clutch' );
	}
    echo '</div>';
//	clutch-leader
}