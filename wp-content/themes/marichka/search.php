<?php get_header(); ?>
    <section class="section head search_page">
        <h1><?php _e( pll__('search_results') );?></h1>
    </section>

    <section class="section breadcrumbs">
	    <?php
	    if(function_exists('bcn_display')) {
		    bcn_display();
	    }
	    ?>
    </section>

    <section class="section search_page categories">
        <div class="container">
            <div class="post_box">
	            <?php
	            if (have_posts()){
		            while (have_posts()): the_post();
			            $post_url = get_the_permalink();
			            $thumb = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : '/wp-content/themes/marichka/img/default_thumb.png';
			            $title = get_the_title();
			            $date = get_the_date('d/m/Y');
			            ?>
                        <div class="post">
                            <div class="preview_img" style="background: url(<?= $thumb; ?>) center no-repeat; background-size: cover"></div>
                            <div class="preview_description">
                                <div class="post_date">
						            <?=$date;?>
                                </div>
                                <div class="post_title">
						            <?= $title; ?>
                                </div>
                                <div class="post_read_more">
                                    <a class="btn blue" href="<?= $post_url; ?>">
							            <?=pll__('read_more');?>
                                    </a>
                                </div>
                            </div>
                        </div>
		            <?php
		            endwhile;
	            } else {
		            echo pll__('nothing_found');
	            }?>
            </div>
            <div class="pagination">
		        <?php
		        the_posts_pagination( [
			        'prev_text'          => pll__( 'Previous' ),
			        'next_text'          => pll__( 'Next' ),
		        ] );
		        wp_reset_query(); // Restore the $wp_query and global post data to the original main query.
		        ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>