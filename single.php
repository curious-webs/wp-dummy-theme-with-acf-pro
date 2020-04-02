<?php
get_header();
get_template_part('inc/site', 'breadcrumb');
?>
<div class="post-details-wrapper py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>
                    <?php echo get_the_title(); ?>
                </h1>
                <span class="d-block mb-2 text-secondary">
                    <span class="fa fa-calendar" aria-hidden="true"></span>

                    <?php echo get_the_date("d/m/Y"); ?>
                </span>
                <span class="d-block mb-2 text-secondary">
                    <span class="fa fa-user" aria-hidden="true"></span>

                    <?php echo get_the_author(); ?>
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
                <?php if (get_the_post_thumbnail_url()) { ?>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"  alt="<?php echo get_the_title(); ?>"/>
                <?php } ?>

                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_content();
                    } // end while
                } // end if

                wp_reset_postdata();
                ?>
                <?php
                
              echo  comment_form();
              
                ?>
            </div>


            <div class="col-md-4">
<?php echo get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>