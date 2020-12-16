<?php
declare( strict_types=1 );
$term = get_query_var('term');
$services = get_field('related_services', $term) ?? [];
?>
<div class="related_services">
    <div class="sticky">
        <h3>
		    <?=pll__('related_services');?>
        </h3>
        <div>
		    <?=pll__('you_may_be_interesting');?>
        </div>

        <div class="related_services_box">
		    <?php
            if ($services) {
	            foreach ($services as $service) {
		            ?>
                    <a href="<?=get_permalink($service->ID)?>" class="service">
                <span class="service_icon">
                    <img src="<?=get_the_post_thumbnail_url($service->ID)?>" alt="<?=get_the_title($service->ID)?>">
                </span>
                        <span class="service_title">
                    <?=get_the_title($service->ID)?>
                </span>
                    </a>
		            <?php
	            }
            } else {
                echo 'other services here';
            }
		    ?>
        </div>
    </div>
</div>


