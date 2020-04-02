<?php
/*
  Template Name: Contact Page
 */
get_header();
get_template_part('inc/site', 'breadcrumb');
?>
<section class="contact-page-section-wrap p-5">
    <div class="container">
        <div class="row"> 
            <div class="col-md-8">
                <h1 class="pb-3"><?php echo get_the_title(); ?></h1>
                <div class="description-text">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_content();
                        } // end while
                    } // end if
                    ?>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="49" title="Contact form 1"]'); ?>
            </div>
            <div class="col-md-4">
                <?php if (is_active_sidebar('contact-page-sidebar')) : ?>
                    <div id="secondary" class="widget-area" role="complementary">
                        <?php dynamic_sidebar('contact-page-sidebar'); ?>
                    </div>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
