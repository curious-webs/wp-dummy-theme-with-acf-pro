<?php
/*
  Template Name: About Page
 */
get_header();
?>
<?php get_template_part( 'inc/site', 'breadcrumb' ); ?>

<div class="page-wrapper py-5">
    <div class="container">
        <h1 class="text-center"><?php echo get_the_title(); ?></h1>
        <div class="row">
            <div class="col-md-8">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_content();
                    } // end while
                } // end if
                ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>