<!DOCTYPE html>
<!--[if lt IE 7]>
        <html class="ie ie6 lte9 lte8 lte7" <?php language_attributes(); ?>>
        <![endif]-->
<!--[if IE 7]>
<html class="ie ie7 lte9 lte8 lte7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 lte9 lte8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if gt IE 9]>
<html <?php language_attributes(); ?>> <![endif]-->
<!--[if !IE]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title> 
        <?php wp_head(); ?>
        <script type="text/javascript">
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        </script>
    </head>
    <body <?php body_class(); ?>>
        <header id="header" class="header">
            <div class="container-fluid p-0">

                <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <a href="<?php echo get_site_url(); ?>" class="navbar-brand">
                        <?php
                        /*                         * *
                         * Theme Logo
                         */
                        ?> 
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                        ?>
                        <img src="<?php echo $image[0]; ?>" alt="<?php bloginfo("name"); ?>">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <?php
                        /*                         * ***             * *
                         * Menus
                         */
                        ?>
                        <?php
                        wp_nav_menu(array(
                        'menu' => 'header_menu',
                        'menu_id' => 'header-menu',
                        'theme_location' => 'header_menu',
                        'depth' => 4,
                        'menu_class' => 'nav navbar-nav',
                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                        'walker' => new WP_Bootstrap_Navwalker())
                        );
                        ?>
                        <?php
                        /*                         * *
                         * Search Form
                         */
                        ?>
                        <?php echo get_search_form(); ?>

                        <div id="secondary" class="widget-area" role="complementary">

                            <ul class="social-links list-group list-group-horizontal">
                                <?php if (get_field('facebook','option')) { ?>
                                <li class="list-group-item">
                                    <a href="<?php echo get_field('facebook','option'); ?>">
                                        <span class="fab fa-facebook"></span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (get_field('twitter','option')) { ?>
                                <li class="list-group-item">
                                    <a href="<?php echo get_field('twitter','option'); ?>">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (get_field('instagram','option')) { ?>
                                <li class="list-group-item">
                                    <a href="<?php echo get_field('instagram','option'); ?>">
                                        <span class="fab fa-instagram"></span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                           
                        </div>

                    </div>

                </nav>    
            </div>
        </header>
        <main  id="main-wrapper" class="main-wrapper">