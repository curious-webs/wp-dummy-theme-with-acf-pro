<?php get_header(); ?> 
<div class="search-page-wrapper py-5">
    <div class="container">
        <h2 class="mb-4 pl-15px">Search Results for : <?php printf(get_search_query()); ?></h2>
        <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
        <div class="row">
            <div class="col-md-8">
                <?php
                $s = get_search_query();
                $args = array(
                    's' => $s,
                    'posts_per_page' => '6',
                    'paged' => $paged,
                );
                $post_query = new WP_Query($args);
                if ($post_query->have_posts()) {
                    while ($post_query->have_posts()) {
                        $post_query->the_post();
                        $featured_img_url = wp_get_attachment_url(get_post_thumbnail_id($my_query->ID));
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
                        <?php
                    }
                } else {
                    wp_reset_query();

                    echo "<div class='col-md-4 mb-30px'><p>No, Search Results Found!!</p></div>";
                }
                kriesi_pagination();
                ?>
            </div>
            <div class="col-md-4">
                <?php echo get_sidebar(); ?>
            </div>
        </div>

    </div>
</div>


<?php get_footer(); ?>

