<?php
get_header();
get_template_part('inc/site', 'breadcrumb');
$posttype = get_post_type();
$default_posts_per_page = "10";
?>
<div class="blog-page-wrapper py-5">
    <div class="container">
        <h1 class="text-center mb-4">Articles</h1>

        <div class="row">
            <div class="col-md-8">
                <div id="dynamic-load-more-content">


                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $default_posts_per_page,
                        'order_by' => 'date',
                        'order' => 'ASC'
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post();
                            ?>
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
                        <?php endwhile; ?> 

                    <?php } ?>
                    <?php
                    wp_reset_postdata();
                    // kriesi_pagination();
                    ?>
                </div>
                <?php if ($query->max_num_pages > 1) { ?>
                    <div class="text-center">
                        <div id=""  <?php
                        if ($catid) {
                            echo "data-taxonomy='" . $taxonomy_name . "'" . " data-term-id='" . $catid . "'";
                        }
                        ?>  data-post-type="<?php echo $posttype; ?>" 
                             data-loaded="" data-loop="1" 
                             data-posts-per-page="<?php echo $default_posts_per_page; ?>" 
                             data-current-page="1" 
                             data-max-pages="<?php echo $query->max_num_pages; ?>"  
                             class="btn load-more-button dynamic-load-more-button">
                            <span class="load-more-text">Load More</span> 
                            <span class="loader"></span>
                        </div>
                    </div>
                <?php } ?> 
            </div>

            <div class="col-md-4 pl-25px">   
                <?php echo get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>