<?php
/* Template Name: Partnership */

get_header();

$bg = get_field('background');
if ($bg) {
	$style = 'style="background: url('. $bg .') center top no-repeat; background-size: cover"';
} else {
	$style = '';
}
?>
    <section class="section head partnership" <?=$style;?>>
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="section breadcrumbs">
		<?php
		if(function_exists('bcn_display')) {
			bcn_display();
		}
		?>
    </section>

    <section class="section partnership">
        <div class="container">
            <div class="content">
                <div class="article">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
                    <a href="#contact_us" class="btn blue discuss">
		                <?=pll__('discuss_partnership')?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section partnership_pros">
        <div class="container">
            <h2>
                <?=pll__('partnership_pros')?>
            </h2>
            <div class="pros_box">
                <?php
                $partnershipPros = get_field('partnership_pros') ?? [];
                for ($i = 0; $i < count($partnershipPros); $i++) {
                    $prosName = $partnershipPros[$i]['pros_name'];
                    $prosDescription = $partnershipPros[$i]['pros_description'];
                    ?>
                    <div class="pros">
                        <div class="hex pros_number">
                            <span>
                                <?=$i+1;?>
                            </span>
                        </div>
                        <div class="pros_wrap">
                            <div class="pros_title">
		                        <?=$prosName?>
                            </div>
                            <div class="pros_description">
		                        <?=$prosDescription;?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section class="section problems">
        <div class="container">
            <h2>
                <?=pll__('your_clients_problems')?>
            </h2>
            <div class="problems_box">
	            <?php
	            $problems = get_field('clients_problems') ?? [];
	            foreach ($problems as $problem) {
		            $title = $problem['problem_title'];
		            $description = $problem['problem_description'];
		            ?>
                    <div class="problem">
                        <div class="problem_title">
                            <?=$title;?>
                        </div>
                        <div class="problem_description">
                            <?=$description;?>
                        </div>
                    </div>
		            <?php
	            }
	            ?>
            </div>
        </div>
        <div class="container cta">
            <?=get_field('call_to_action')?>
        </div>
    </section>

    <section class="section partner_type_group">
        <div class="container">
            <div class="partner_type_group_box">
                <?php
                $partner_types = get_field('partner_types') ?? [];
                foreach ($partner_types as $partner_type_num=>$partner_type) {
                    $partner_type_title = $partner_type['partner_type_title'];
                    $partner_type_description = $partner_type['partner_type_description'];
                    ?>
                    <div class="partner_type">
                        <div class="partner_type_title">
                            <div class="hex partner_type_number">
                                <span>
                                    <?=$partner_type_num+1;?>
                                </span>
                            </div>
                            <div>
                                <?=$partner_type_title;?>
                            </div>
                        </div>
                        <div class="partner_type_description">
                            <?=$partner_type_description;?>
                        </div>
                    </div>
                    <?php
                }
                ?>
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