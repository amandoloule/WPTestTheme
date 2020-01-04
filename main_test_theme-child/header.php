<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js jquery-loading lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js jquery-loading lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js jquery-loading lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js jquery-loading"> <!--<![endif]-->
    <html <?php language_attributes(); ?> class="no-js">
        <head>
            <meta charset="<?php bloginfo('charset'); ?>">
            <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
            <meta name="viewport" content="width=device-width">
            <meta name = "format-detection" content = "telephone=no">
            <link rel="profile" href="http://gmpg.org/xfn/11">
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
            <!--[if lt IE 9]>
            <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
            <![endif]-->
            <?php wp_head(); ?>
        </head>
        <body <?php body_class(); ?>>
            <header>
                <div class="container position-relative">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/dist/img/background.jpg" class="img-fluid">
                    <div class="text-center centered">
                        <h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
                        <h2><small><?php bloginfo('description'); ?></small></h2>
                    </div>
                </div>
            </header>
            <nav>
                <div class="container">
                    <!--<ul class="nav bg-dark">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                    </ul>-->
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => 'false',
                            'menu_class'        => 'nav bg-dark',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        ));
                    ?>
                <div class="container">
            </nav>