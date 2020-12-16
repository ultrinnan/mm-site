<?php

echo '<div class="contacts">';

if ( is_active_sidebar( 'footer_phone' ) ) {
	echo '<div>';
	dynamic_sidebar( 'footer_phone' );
	echo '</div>';
}
if ( is_active_sidebar( 'footer_email' ) ) {
	echo '<div>';
	dynamic_sidebar( 'footer_email' );
	echo '</div>';
}
if ( is_active_sidebar( 'footer_address1' ) ) {
	echo '<div>';
	dynamic_sidebar( 'footer_address1' );
	echo '</div>';
}
if ( is_active_sidebar( 'footer_address2' ) ) {
	echo '<div>';
	dynamic_sidebar( 'footer_address2' );
	echo '</div>';
}

echo '</div>';