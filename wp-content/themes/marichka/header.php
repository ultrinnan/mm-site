<?php
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php 
          if (isset($_SERVER['HTTP_USER_AGENT']) &&
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        header('X-UA-Compatible: IE=edge,chrome=1');
    ?>
    <title><?php wp_title(); ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" />
    <?php wp_head(); ?>
</head>

<body>
    <header class="<?=is_front_page()?'frontpage':'';?>">
        <div class="container">
            <div class="header_logo">
                <a href="<?=home_url();?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/marichka-logo.svg" alt="Marichka Motors logo" />
                </a>
            </div>
        </div>
    </header>
    <main>
