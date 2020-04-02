<?php

// function that runs when shortcode is called
function get_featured_posts() {
    $query = new WP_Query(
            array(
        'meta_key' => '_is_ns_featured_post',
        'meta_value' => 'yes',
        'post_type' => "post",
        'posts_per_page' => -1
    ));
    ?>
    <section class="featured-posts-wrapper py-5">  
        <div class="container">
            <h2 class="text-center mb-3">Posts</h2>
            <div id="post-carousel" class = "owl-carousel owl-theme">
                <?php
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <div class = "item p-2 border d-flex h-100">

                            <div class="post-items-inner-wrap">
                                <?php if (get_the_post_thumbnail_url()) { ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"  alt="<?php echo get_the_title(); ?>"/>
                                <?php } ?>
                                <h4><?php the_title(); ?></h4>
                                <span class="d-block mb-2 text-secondary">
                                   <span class="fas fa-calendar" aria-hidden="true"></span>

                                    <?php echo get_the_date("d/m/Y"); ?>
                                </span>
                                <p>
                                    <?php
                                    $cat_lists = get_the_category(get_the_ID());
                                    foreach ($cat_lists as $cat) {
                                        ?>
                                    <a class="post-cat-item" href="<?php echo get_category_link($cat); ?>">
                                        <?php echo $cat->name; ?>
                                    </a>
                                    <?php }
                                    ?>
                                </p>
                                <p> <?php echo wp_trim_words(get_the_excerpt(), "35", "....."); ?></p>
                                <?php
                                // use get_the_content() for content
                                ?>
                                <a class="btn btn-sm btn-outline-primary" href="<?php the_permalink(); ?>">
                                    View Detail  
                                </a>
                            </div>
                        </div>

                        <?php
                    } // end while
                } // end if
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="btn-wrapper text-center mt-3 mb-3">
            <a class="bg-btn btn btn-sm btn-primary pt-2 pb-2 px-3" href="/blogs">View ALL</a>
        </div>
    </div>
    </section>
    <?php
}

// register shortcode
add_shortcode('FeaturedPosts', 'get_featured_posts');

