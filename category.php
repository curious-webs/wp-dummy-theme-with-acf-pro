<?php
/**
 * Category Template
 */
get_header();
get_template_part('inc/site', 'breadcrumb');
?> 
<div class="category-wrapper py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="archive-title mb-4">Category: <?php echo single_cat_title('', false); ?></h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php
                if (category_description()) :
                    ?>
                    <div class="archive-meta"><?php echo category_description(); ?></div>
                <?php endif; ?>
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
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
                    endwhile;
                else:
                    ?>
                    <p>Sorry, no posts matched your criteria.</p>
                <?php
                endif;
                wp_reset_postdata();
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