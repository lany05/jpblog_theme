<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php mts_meta(); ?>
    <title><?php wp_title(); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body class="bg-body">
<header class="navbar navbar-static-top header-jp-blog">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-lr">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?php bloginfo('url'); ?>" class="logo-blog" title="Jobplanet" alt="Jobplanet Official Blog"><h3>Official Blog</h3></a>
                </div>
		<div class="menu-wrapper collapse" id="main-nav">
                <?php if (has_nav_menu('primary-menu')) { ?>
                    <?php wp_nav_menu(array('menu_class' => 'navbar-blog', 'menu_id' => 'menu-item')); ?>
                <?php } else { ?>
                    <ul class="navbar-blog">
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                <?php } ?>
                <?php get_template_part('searchform'); ?>
		</div>
            </div>
        </div>
    </div>
</header>
