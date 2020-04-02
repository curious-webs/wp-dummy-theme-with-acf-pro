<?php get_header(); ?>
<?php
/* * *******
 * Get Featured posts of a custom taxonomy of custom post type
 */
?>
<?php
$query = new WP_Query(
        array(
    'meta_key' => '_is_ns_featured_post',
    'meta_value' => 'yes',
    'post_type' => "services",
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'services_cat',
            'field' => 'slug',
            'terms' => 'cat1'
        ),
    ),
    'orderby' => 'date',
    'order' => 'DESC'
        ));
?>
<?php if ($query->have_posts()) { ?>
    <section class="services-wrapper py-5 border-bottom">
        <div class="container">
            <h2 class="h2 text-center mb-4">Services</h2>


            <div id="services-carousel" class = "owl-carousel owl-theme">


                <?php
                while ($query->have_posts()) {
                    $query->the_post();
                    ?>
                    <div class = "item">
                        <?php if (get_the_post_thumbnail_url()) { ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"  alt="<?php echo get_the_title(); ?>"/>
                        <?php } ?>
                        <h4><?php the_title(); ?></h4>
                        <p> <?php echo wp_trim_words(get_the_excerpt(), "35", "....."); ?></p>
                        <?php
                        // use get_the_content() for content
                        ?>
                        <a class="read-more   read-more-services-btn" href="<?php the_permalink(); ?>">
                            Read More
                        </a>
                    </div>
                    <?php
                } // end while
                ?>
            </div>
            <div class="btn-wrapper text-center mt-3 mb-3">
                <a class="bg-btn btn btn-sm btn-primary pt-2 pb-2 px-3" href="/services_cat/cat1/">View ALL</a>
            </div>
        </div>
    </section>
    <?php
} // end if
wp_reset_postdata();
?>
<?php
/* * **
 * Call Featured Posts on Home page****
 */
?>
<?php echo do_shortcode('[FeaturedPosts]'); ?>
<?php get_footer(); ?>

