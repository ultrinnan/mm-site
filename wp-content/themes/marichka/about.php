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
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if(function_exists('bcn_display')) {
			bcn_display();
		}
		?>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">
                <div class="article">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section differences">
        <div class="container">
            <h2>
                <?=pll__('our_differences')?>
            </h2>
            <div class="differences_box">
                <?php
                $differences = get_field('differences') ?? [];
                for ($i = 0; $i < count($differences); $i++) {
                    $difference_name = $differences[$i]['difference_name'];
                    $difference_description = $differences[$i]['difference_description'];
                    ?>
                    <div class="difference">
                        <div class="dif_title">
                            <div class="hex dif_number">
                                <span>
                                    <?=$i+1;?>
                                </span>
                            </div>
                            <div class="dif_name">
	                            <?=$difference_name?>
                            </div>
                        </div>
                        <div class="dif_description">
                            <?=$difference_description;?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section class="section certificates">
        <div class="container">
            <h2>
				<?=pll__('Certificates');?>
            </h2>
            <a href="<?=get_field('certificates_link')?>" class="certificates_box">
                <span class="hex big" title="BSI">
                    <span class="certificate_logo bsi"></span>
                </span>
                    <span class="hex big" title="CISSP">
                    <span class="certificate_logo cissp"></span>
                </span>
                    <span class="hex big" title="PECB">
                    <span class="certificate_logo pecb"></span>
                </span>
                    <span class="hex big" title="ISA">
                    <span class="certificate_logo isa"></span>
                </span>
                    <span class="hex big" title="CISA">
                    <span class="certificate_logo cisa"></span>
                </span>
                    <span class="hex big" title="OSCP">
                    <span class="certificate_logo oscp"></span>
                </span>
                    <span class="hex big" title="CEH">
                    <span class="certificate_logo ceh"></span>
                </span>
            </a>
            <div class="cert_nav">
                <div class="cert_prev"></div>
                <div class="cert_dots"></div>
                <div class="cert_next"></div>
            </div>
        </div>
    </section>

    <section class="section team">
        <div class="container">
            <h2>
                <?=pll__('our_team')?>
            </h2>
            <div class="team_box">
	            <?php
	            $members = get_field('team') ?? [];
	            foreach ($members as $member) {
		            $photo = $member['photo'];
		            $name = $member['name'];
		            $title = $member['title'];
		            $position = $member['position'];
		            ?>
                    <div class="member">
                        <div class="member_photo" style="background: url('<?=$photo;?>') center top no-repeat; background-size: cover;"></div>
                        <div class="member_desc">
                            <div class="member_name">
                                <?=$name;?>
                                <br>
                                <?=$title;?>
                            </div>
                            <div class="member_position">
                                <?=$position;?>
                            </div>
                        </div>
                    </div>
		            <?php
	            }
	            ?>
            </div>
            <div class="team_nav">
                <div class="team_prev"></div>
                <div class="team_dots"></div>
                <div class="team_next"></div>
            </div>
        </div>
    </section>

    <section class="section contacts">
        <div class="contacts_anchor" id="contact_us"></div>
        <div class="container">
            <div class="contacts_box">
                <div class="modal_main">
					<?php
					if ( is_active_sidebar( 'frontpage_contact' ) ) {
						dynamic_sidebar( 'frontpage_contact' );
					}
					?>
                </div>
                <div class="modal_thanks hidden">
                    <div class="modal_check_success"></div>
                    <div class="thanks_header">
						<?=pll__('thank_you')?>
                    </div>
                    <div class="thanks_text">
						<?=pll__('email_sent')?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>