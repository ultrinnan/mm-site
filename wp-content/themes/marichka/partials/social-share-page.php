<?php
/**
facebook sharing needs API ID
 */
//share URL, title, description, image

function share($key)
{
	global $post;
	$url = get_permalink($post->ID);
	$title = wp_title('', false);
	$caption = get_field($post->ID, '_yoast_wpseo_opengraph-description', false);
	$twitter_caption = get_field($post->ID, '_yoast_wpseo_twitter-description', false);
	$e_url = rawurlencode($url);
	$e_title = rawurlencode($title);
	$e_caption = rawurlencode($caption);
	$e_twitter_caption = rawurlencode($twitter_caption);
	$sharelinks = (object)array(
		'linkedin' => 'https://www.linkedin.com/sharing/share-offsite/?url=' . $e_url . '&title=' . $e_title . '&summary=' . $e_caption,
		'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $e_url,
		'twitter' => 'https://twitter.com/intent/tweet?url=' . $e_url . '&text=' . $e_twitter_caption,
		'email' => 'mailto:?&subject=' . $e_title . '&body=' . $e_url . '%20' . $e_caption,
	);
	return $sharelinks->$key;
}

$social = get_option('social_options');
$insta_url = $social['instagram'] ?? '#';

?>
<div class="social_share_box">
    <div class="hex solid">
        <a class="social linkedin" href="<?= share('linkedin');?>" target="_blank"></a>
    </div>
    <div class="hex solid">
        <a class="social facebook" href="<?= share('facebook');?>" target="_blank"></a>
    </div>
    <div class="hex solid">
        <a rel="nofollow" class="social instagram" target="_blank" title="Follow us on Instagram" href="<?=$insta_url?>"></a>
    </div>
</div>