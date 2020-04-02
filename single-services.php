<?php get_header(); ?>
<div class="services-page-wrap py-5">
    <div class="container">
        <h1>
            <?php the_title(); ?>
        </h1>
        <?php
        $id = get_the_id();
        $terms = get_the_terms($id, 'services_cat');
        // print_r( $terms );
        foreach ($terms as $term) {
            echo $term->term_name;
        }
        ?>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
            } // end while
        } // end if
         wp_reset_postdata(); 
        ?>
    </div>
</div>

<?php get_footer(); ?>