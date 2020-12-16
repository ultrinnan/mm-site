<?php
?>
<div class="latest_news">
    <h3><?=pll__('latest_news')?></h3>
    <div class="news_box">
<?php

$post_args = [
    'post_type' => 'post',
    'posts_per_page' => 2,
    'post__not_in' => array($post->ID),
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
    <div class="news">
        <div class="preview_img" style="background: url(<?= $thumb; ?>) center no-repeat; background-size: cover"></div>
        <div class="preview_description">
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
	<?
	if ( is_active_sidebar( 'news_more_link' ) ) {
		dynamic_sidebar( 'news_more_link' );
	}
	?>
</div>
