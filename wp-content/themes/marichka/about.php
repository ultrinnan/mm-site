<?php
/* Template Name: About */

get_header();

$bg = get_field('background');
if ($bg) {
	$style = 'style="background: url('. $bg .') center top no-repeat; background-size: cover"';
} else {
	$style = '';
}
?>
    <section class="section head about" <?=$style;?>>
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="section about">
        <div class="container">
            <div class="content">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>

    <section class="section about">
        <div class="container">
            <div class="team_box">
	            <?php
	            $members = get_field('team') ?? [];
	            foreach ($members as $member) {
		            $photo = !!$member['photo'] ? $member['photo'] : get_stylesheet_directory_uri() . '/img/default_user.svg';
		            $name = $member['name'];
		            $title = $member['title'];
		            ?>
                    <div class="member">
                        <div class="member_photo" style="background: url('<?=$photo;?>') center top no-repeat; background-size: cover;"></div>
                        <div class="member_desc">
                            <div class="member_name">
                                <?=$name;?>
                            </div>
                            <div class="member_title">
                                <?=$title;?>
                            </div>
                        </div>
                    </div>
		            <?php
	            }
	            ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>