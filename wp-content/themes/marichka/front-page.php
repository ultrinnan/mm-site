<?php
/*
 * Template Name: Front page
 */

get_header();

$hero_image = get_field('hero_picture');
$style = $hero_image ? 'style="background: url(' . $hero_image . ') center no-repeat; background-size: cover;"' : '';

$hero_video = get_field('hero_video');
$certLink = get_field('certificates_link');
?>

<section class="section hero" <?=$style;?>>
    <div class="container">
        <h2 class="hidden">Marichka Motors</h2>
        <div class="title">
            <span>Listen to nature. </span>
            <span>Not engine.</span>
        </div>
        <div class="subtitle">
            Ride electric.
        </div>
    </div>
</section>

<?php get_footer(); ?>
