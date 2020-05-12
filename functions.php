<?php
/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */

add_theme_support('title-tag');

/*
 * Enable support for Post Thumbnails on posts and pages.
 *
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 */

add_theme_support('post-thumbnails');
/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */

add_theme_support(
        'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
        )
);

// Add support for Block Styles.

add_theme_support('wp-block-styles');

// Add support for full and wide align images.

add_theme_support('align-wide');

// Add support for editor styles.

add_theme_support('editor-styles');

// Enqueue editor styles.

add_editor_style('style-editor.css');

// Add custom editor font sizes.

add_theme_support(
        'editor-font-sizes', array(
    array(
        'name' => __('Small', 'twentynineteen'),
        'shortName' => __('S', 'twentynineteen'),
        'size' => 19.5,
        'slug' => 'small',
    ),
    array(
        'name' => __('Normal', 'twentynineteen'),
        'shortName' => __('M', 'twentynineteen'),
        'size' => 22,
        'slug' => 'normal',
    ),
    array(
        'name' => __('Large', 'twentynineteen'),
        'shortName' => __('L', 'twentynineteen'),
        'size' => 36.5,
        'slug' => 'large',
    ),
    array(
        'name' => __('Huge', 'twentynineteen'),
        'shortName' => __('XL', 'twentynineteen'),
        'size' => 49.5,
        'slug' => 'huge',
    ),
        )
);

// Add support for responsive embedded content.

add_theme_support('responsive-embeds');

/**
 * Disable the emoji's
 */
function disable_emojis() {

    remove_action('wp_head', 'print_emoji_detection_script', 7);

    remove_action('admin_print_scripts', 'print_emoji_detection_script');

    remove_action('wp_print_styles', 'print_emoji_styles');

    remove_action('admin_print_styles', 'print_emoji_styles');

    remove_filter('the_content_feed', 'wp_staticize_emoji');

    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins) {

    if (is_array($plugins)) {

        return array_diff($plugins, array('wpemoji'));
    } else {

        return array();
    }
}

/* * *****
 * Theme Logo
 */
add_theme_support('custom-logo', array(
    'height' => 100,
    'width' => 400,
    'flex-height' => true,
    'flex-width' => true,
    'header-text' => array('site-title', 'site-description'),
));

/* * ***
 * ** Menus
 */

function register_my_menu() {
    register_nav_menus(array(
        'header_menu' => __('Header Menu', 'text_domain'),
        'footer_menu' => __('Footer Menu', 'text_domain'),
        'extra_menu' => __('Extra Menu', 'text_domain')
    ));
}

add_action('init', 'register_my_menu');


/* * **
 * Widgets
 */

function wpb_widgets_init() {

    register_sidebar(array(
        'name' => __('Footer Widget', 'wpb'),
        'id' => 'footer-widget',
        'description' => __('The main sidebar appears on the right on each page except the front page template', 'wpb'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Header Information', 'wpb'),
        'id' => 'header-information',
        'description' => __('Appears on the Header', 'wpb'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="header-information">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Blog Sidear', 'wpb'),
        'id' => 'blog-sidebar',
        'description' => __('Sidebar for Blogs', 'wpb'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="header-information">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Contact Page Sidear', 'wpb'),
        'id' => 'contact-page-sidebar',
        'description' => __('Contact Page Sidear', 'wpb'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="contact-page-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'wpb_widgets_init');

/**
 * Including Required Files
 */
require 'inc/post-types.php';
require 'inc/wp-nav-walker.php';
require 'inc/shortcode.php';
require 'inc/acf-blocks.php';

/* * ***
 * Including Css and JS
 */

function wpdocs_theme_name_scripts() {
    wp_enqueue_style('owl-theme-carousel', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), "5.5");
    wp_enqueue_style('owl-theme', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), "5.5");
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/fontawesome.min.css');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('global-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_script('jquery-main', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', array(), '1.0.0', true);
    wp_enqueue_script('jquery-main', get_template_directory_uri() . '/js/jquery-3.4.1.slim.min.js', array(), '1.0.0', true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true);
    wp_enqueue_script('bootstrap-main', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true);
    wp_enqueue_script('my-custom-js', get_template_directory_uri() . '/js/main.js', array(), '1.2.0', true);
}

add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');

/***
 * Disable Version Cache
 */

remove_action('wp_head', 'wp_generator'); // remove version from head


add_filter('the_generator', '__return_empty_string'); // remove version from rss


function remove_version_scripts_styles($src) { // remove version from scripts and styles
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'remove_version_scripts_styles', 9999)



/* * *
 * Custom Pagination
 */

function kriesi_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged))
        $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class='pagination'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link(1) . "'>&laquo;</a>";
        if ($paged > 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($pages) . "'>&raquo;</a>";
        echo "</div>\n";
    }
}

/* * ******
 * Options page
 */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}


/* * ********************************************
 * Dynamic Load More
 * ******************************************** */

function dynamicloadmore() {
    $taxonomy = "";
    $termid = "";
    $keyword = 0;
    if (isset($_POST['taxonomy'])) {
        $taxonomy = $_POST['taxonomy'];
    }
    if (isset($_POST['termid'])) {
        $termid = $_POST['termid'];
    }
    if (isset($_POST['posttype'])) {
        $posttype = $_POST['posttype'];
    }
    if (isset($_POST['postperpage'])) {
        $posts_per_page = $_POST['postperpage'];
    }
    if (isset($_POST['dataloop'])) {
        $dataloop = $_POST['dataloop'];
    }
    if (isset($_POST['currentpage'])) {
        $val = $_POST['currentpage'];
    }
    if (isset($_POST['exclude_id'])) {
        $excludeid = $_POST['exclude_id'];
    }
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
    }
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : $val;
    if (empty($keyword) or $keyword == "undefined" or $keyword == null) {

        if ($termid == "undefined" and $taxonomy == "undefined" or empty($termid) and empty($taxonomy) or $termid == null and $taxonomy == null) {
// This $args will work when only post type no taxonomy
            $args = array(
                'post_type' => $posttype,
                'post__not_in' => array($excludeid),
                'posts_per_page' => $posts_per_page,
                'post_status' => 'publish',
                'paged' => $paged
            );
        } else {
// This $args will work when has post type and taxonomy
            $args = array(
                'post_type' => $posttype,
                'posts_per_page' => $posts_per_page,
                'post__not_in' => array($excludeid),
                'post_status' => 'publish',
                'paged' => $paged,
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'term_id',
                        'terms' => $termid
                    )
                )
            );
        }
    } elseif (isset($keyword) && !empty($posttype)) {
// This $args will work search coming from specific post type
        $args = array(
            's' => $keyword,
            'post_type' => $posttype,
            'posts_per_page' => $posts_per_page,
            'post_status' => 'publish',
            'paged' => $paged
        );
    } elseif (isset($keyword) or empty($posttype) or $posttype == "undefined") {
// This last $args for GLOBAL Search
        $args = array(
            's' => $keyword,
            'posts_per_page' => $posts_per_page,
            'post_status' => 'publish',
            'paged' => $paged
        );
    }
    $get_dynamic_posts = new WP_Query($args);
    if ($get_dynamic_posts->have_posts()) {
        ?>
        <?php
        $varnumber = 1;
        $start = $dataloop;
        while ($get_dynamic_posts->have_posts()) : $get_dynamic_posts->the_post();
            $nextmodal = $posts_per_page + $varnumber;
            ?>
            <?php if (empty($posttype) or $posttype == "undefined" or $posttype == null) { ?>
                <!--++++++ Global Search Result ++++-->
            <?php } ?>
            <?php if ("post-type-name" === $posttype) { ?>
                <!--++++++ Loop Content ++++-->
            <?php } ?>
            <?php if ('Post-type-name' == $posttype && $keyword != "undefined" && !empty($keyword)) { ?>
                <!--++++++ RELATED POST TYPE -- load more on search result page ++++-->
            <?php
            }
            if ('post' == $posttype && $keyword == "undefined" || 'post' == $posttype && empty($keyword)) {
                ?>
                <!--++++++ Blog load more on index.php and on category.php ++++-->
                <div class="post-list-wrap border-bottom pb-3 mb-3">
                    <?php if (get_the_post_thumbnail_url(get_the_ID())) { ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="<?php echo get_the_title(); ?>"/>
                <?php } ?>  
                    <h2>
                        <a class="text-danger" href="<?php the_permalink(); ?>">
                <?php echo get_the_title(); ?>  
                        </a>
                    </h2>
                    <p>
                        <?php
                        $cat_lists = get_the_category(get_the_ID());
                        foreach ($cat_lists as $cat) {
                            ?>
                            <a class="post-cat-item text-info" href="<?php echo get_category_link($cat); ?>">
                            <?php echo $cat->name; ?>
                            </a>
                        <?php }
                        ?>
                    </p>
                    <p>
                        Author : <?php the_author(); ?>
                    </p>
                    <p>
                        Date : <?php echo get_the_date(); ?>
                    </p>
                    <p>
                        Leave a <a href="<?php the_permalink(); ?>#respond">comment</a>
                    </p>
                    <p>
                <?php echo wp_trim_words(get_the_content(), 35, "..."); ?>
                    </p>
                    <a href="<?php the_permalink(); ?>">Read More</a>
                </div>
            <?php } ?>
            <?php
            $varnumber++;
            $start++;
        endwhile;
        ?>
        <?php
        wp_reset_query();
    }
    die;
}

add_action('wp_ajax_nopriv_dynamicloadmore', 'dynamicloadmore');
add_action('wp_ajax_dynamicloadmore', 'dynamicloadmore');

function acfloadmore() {
    $poststart = "";
    $postend = "";
    $datapostid = "";
    $repeatertype = "";
    if (isset($_POST['poststart'])) {
        $poststart = $_POST['poststart'];
    }
    if (isset($_POST['postend'])) {
        $postend = $_POST['postend'];
    }
    if (isset($_POST['data-post-id'])) {
        $datapostid = $_POST['data-post-id'];
    }
    if (isset($_POST['repeatertype'])) {
        $repeatertype = $_POST['repeatertype'];
    }
    if ($poststart && $postend && $repeatertype && $datapostid) {
        if ($repeatertype == "features") {
            if (have_rows('features', $datapostid)):
                $j = 1;
                while (have_rows('features', $datapostid)) : the_row();
                    if ($poststart < $j && $postend >= $j) {
                        ?>
                        <div class="col-sm-6">
                            <img class="img-responsive w-50" src="<?php echo get_sub_field('icon'); ?>" alt=""/>
                            <h3><?php
                                // display a sub field value
                                the_sub_field('title');
                                ?></h3>
                            <?php
                            // display a sub field value
                            the_sub_field('text');
                            ?>
                            <a class="btn tn-sm" href=" <?php
                               // display a sub field value
                               the_sub_field('link');
                               ?>">
                                View Details
                            </a>
                        </div>
                    <?php
                    } $j++;
                endwhile;
            endif;
        }
    }
    die;
}

add_action('wp_ajax_nopriv_acfloadmore', 'acfloadmore');
add_action('wp_ajax_acfloadmore', 'acfloadmore');
/*** To include comment scripts***/
function wpse52737_enqueue_comment_reply_script() {
    if ( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment_reply' );
    }
}
add_action( 'comment_form_before', 'wpse52737_enqueue_comment_reply_script' );
