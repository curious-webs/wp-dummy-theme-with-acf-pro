<?php
/* * *****
 *  Template Name: Services Page
 */
get_header();
?>
<?php
// get list of all the categories 
// cat_link, cat_name, cat_description, view_cat link
?>
<div class="services-features-wrapper py-5">
    <div class="container">

        <?php
// check if the repeater field has rows of data
        $acf_per_page = 2; /*         * * ACF field Per Page *** */
        $acf_repeater_type = "features";  /*         * * Pass Keyword. In this case we use same code multiple time for different repeater ** */
        $totalacf = count(get_field('features')); /*         * * Total Repeat Count ** */
        if (have_rows('features')):
            $i = 1;
            ?>
            <div class="row" id="acf-load-content"> <?php /*         * * Must use ID - Ajax append data ** */ ?>
                <?php
                // loop through the rows of data
                while (have_rows('features')) : the_row();
                    if ($acf_per_page >= $i) {
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
                    }
                    $i++;
                endwhile;
                ?>
            </div>

            <?php
        else :

        // no rows found

        endif;
        ?> 
    </div>
    <div class="text-center load-more-wrapper">
        <?php
        /** Load More Button * */
        if ($acf_per_page < $totalacf) {
            ?>
            <div class="acf-button" id="acf-button"  data-total-post="<?php echo $totalacf; ?>" data-post-id="<?php echo get_the_id(); ?>" data-acf-per-page="<?php echo $acf_per_page; ?>" data-acf-type="<?php echo $acf_repeater_type; ?>" data-acf-post-start="<?php echo $acf_per_page; ?>" data-acf-post-end="<?php echo $acf_per_page + $acf_per_page; ?>"><span class="load-more-text">Load More</span> <span class="loader"></span></div>
        <?php } ?>
    </div>
</div>
</div>
<div class="services-cat-wrap py-5">
    <div class="container">
        <h1 class="text-center"><?php echo get_the_title(); ?></h1>
        <div class="row">
            <div class="col-md-8">
                <?php
                $terms = get_terms('services_cat', array(
                    'hide_empty' => false,
                ));

                foreach ($terms as $term) {
                    ?>
                    <div class="service-cat-item bg-light mb-3 p-3">
                        <h3>
                            <?php echo $term->name; ?>
                        </h3>
                        <p>
                            <?php echo $term->description; ?>
                        </p>
                        <a class="btn btn-sm btn-outline-dark" href="<?php echo get_term_link($term); ?>">
                            View All posts
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="co-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<div class="relatedpostswrap py-5">
    <div class="container">
        <?php
        $posts = get_field('related_services');

        if ($posts):
            ?>
            <div class="row">
                <?php foreach ($posts as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>
                    <div class="col-md-6 post-items-inner-wrap">
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
                <?php endforeach; ?>
            </div>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
