<?php get_header(); ?>
<?php
$current_term = get_queried_object();
$current_term_id = $current_term->term_id;
$taxonomy = 'services_cat';
$term_args = array(
    'parent' => $current_term_id,
    'hide_empty' => false,
    'orderby' => 'name',
    'order' => 'ASC'
);
$terms = get_terms($taxonomy, $term_args);
get_template_part("inc/site", "breadcrumb");
?> 

<?php
/*
 * ============ Top Section Content ================
 */
?>

<section class="taxonomy-top-section text-center pb-5">
    <div class="container">
        <div class="row">
            <div class="content-wrapper mx-auto w-85 text-center">
                <div class="custom-heading-bausch-lomb">
                    <h1 class="h1  custom-main-page-title">
                        <?php echo $current_term->name; ?>
                    </h1>  
                </div>
                <p><?php echo $current_term->description; ?></p>
            </div>
        </div>
    </div>
</section>

<div class="services-cat-wrap pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                foreach ($terms as $term) {
                    ?>
                    <?php
                    /*                     * *********
                     * ============================ Showing Sub Categories =============================
                     */
                    ?>
                    <div class="service-cat-item">
                        <h3 class="mb-3 text-center">
                            <?php echo $term->name; ?>
                        </h3>
                        <p>
                            <?php echo $term->description; ?>
                        </p>
                        <?php
                        /*                         * *********
                         * ============================ Showing Posts of Categories =============================
                         */
                        ?>
                        <?php
                        $args = array(
                            'post_type' => "services",
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'services_cat',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                ),
                            ),
                        );
                        $my_query = new WP_Query($args);
                        ?>

                        <?php
                        if ($my_query->have_posts()) {
                            while ($my_query->have_posts()) : $my_query->the_post();
                                $featured_img_url = wp_get_attachment_url(get_post_thumbnail_id($my_query->ID));
                                ?>
                                <div class="post-list-wrap border-bottom pb-3 mb-3">
                                   
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
                                        <?php echo wp_trim_words(get_the_content(), 35, "..."); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>">Read More</a>
                                </div>
                                <?php
                            endwhile;
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
</div>




<?php get_footer(); ?>   