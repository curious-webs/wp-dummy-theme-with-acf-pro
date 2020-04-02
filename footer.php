</main>
<footer id="page-foooter" class="page-footer border-top">
    <div class="container">
        <div class="d-flex align-items-start py-3">

            <div class="col footer-section footer-section-one">
                <?php
                /*                 * *
                 * Widget Call
                 */
                ?>
                <?php
                wp_nav_menu(array(
                    'menu' => 'footer_menu',
                    'menu_id' => 'footer_menu',
                    'theme_location' => 'footer_menu',
                    'menu_class' => 'footer-menu-wrap menu-wrap'
                ));
                ?>
            </div>
            <div class="col footer-section footer-section-two">

                <div id="secondary" class="widget-area" role="complementary">
                    <?php if (get_field('about_us_section_title', 'option')) { ?>
                        <h3><?php echo get_field('about_us_section_title', 'option'); ?></h3>
                    <?php } ?>
                    <?php if (get_field('about_us_section_text', 'option')) { ?>
                        <div class="about-us-footer-wrap">
                            <?php echo get_field('about_us_section_text', 'option'); ?>
                        </div>
                    <?php } ?>
                    <h3><?php echo get_field('follow_us_text', 'option'); ?></h3>
                    <ul class="social-links list-group list-group-horizontal">
                        <?php if (get_field('facebook', 'option')) { ?>
                            <li class="list-group-item">
                                <a href="<?php echo get_field('facebook', 'option'); ?>">
                                    <span class="fab fa-facebook"></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (get_field('twitter', 'option')) { ?>
                            <li class="list-group-item">
                                <a href="<?php echo get_field('twitter', 'option'); ?>">
                                    <span class="fab fa-twitter"></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (get_field('instagram', 'option')) { ?>
                            <li class="list-group-item">
                                <a href="<?php echo get_field('instagram', 'option'); ?>">
                                    <span class="fab fa-instagram"></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="text-center py-3 bg-light">
            © <?php echo date("Y"); ?> <a href="/"><?php echo bloginfo('name'); ?></a>
        </div>
    </div>
</footer> 

<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function ($) {
        var $ = jQuery;
        $(".dynamic-load-more-button").on("click", function () {
            $this = $(this);
            $taxonomy = $(this).attr("data-taxonomy");
            $termid = $(this).attr("data-term-id");
            $dataloaded = $(this).attr("data-loaded");
            $posttype = $(this).attr("data-post-type");
            $post_per_page = $(this).attr("data-posts-per-page");
            $dataloop = $(this).attr("data-loop");
            $postcounter = parseInt($dataloop) + parseInt($post_per_page);
            $postcounter_result = $(this).attr("data-loop", $postcounter);
            $exclude_id = $(this).attr("exclude-post");
            $currentpage = $(this).attr("data-current-page");
            $searchkeyward = $(this).attr("data-search-keyward");
            $currentpage++;
            $maxpage = $(this).attr("data-max-pages");
            $currentpageval = $(this).attr("data-current-page", $currentpage);
            var str = '&taxonomy=' + $taxonomy + '&termid=' + $termid + '&posttype=' + $posttype + '&dataloop=' + $postcounter + '&keyword=' + $searchkeyward + '&currentpage=' + $currentpage + '&exclude_id=' + $exclude_id + '&postperpage=' + $post_per_page + '&action=dynamicloadmore';
            $.ajax({
                data: str,
                dataType: "html",
                type: 'post',
                url: ajaxurl,
                beforeSend: function () {
                    $(".load-more-button").addClass("disable-btn");
                    $(".load-more-button .load-more-text").hide();
                    $(".load-more-button .loader").css("display", "inline-block");
                },
                success: function (data) {
                    if ($dataloaded) {
                        $("#" + $dataloaded).append(data);
                    } else {
                        $("#dynamic-load-more-content").append(data);
                    }
                    $(".load-more-button").removeClass("disable-btn");
                    $(".load-more-button .load-more-text").show();
                    $(".load-more-button .loader").css("display", "none");
                    if ($currentpage >= $maxpage) {
                        $($this).hide();
                    }
                }
            });
        });
    });
</script>
<script>
    /*** Load More ****/
    jQuery(document).ready(function ($) {
        $("#acf-button").on("click", function () {

            $acfperpage = $(this).attr("data-acf-per-page");
            $postid = $(this).attr("data-post-id");
            $acf_repeater_type = $(this).attr("data-acf-type");
            $datatotal = $(this).attr("data-total-post");

            /** Range - Start ***/
            $poststart = $(this).attr("data-acf-post-start");
            $poststart_revise = parseInt($poststart) + parseInt($acfperpage);
            $poststart_revised = $(this).attr("data-acf-post-start", $poststart_revise);

            /** Range - End ***/
            $postend = $(this).attr("data-acf-post-end");
            $postend_revise = parseInt($postend) + parseInt($acfperpage);
            $postend_revised = $(this).attr("data-acf-post-end", $postend_revise);

            var str = '&poststart=' + $poststart + '&postend=' + $postend + '&data-post-id=' + $postid + '&repeatertype=' + $acf_repeater_type + '&action=acfloadmore';
            $.ajax({
                data: str,
                dataType: "html",
                type: 'post',
                url: ajaxurl,
                beforeSend: function () {
                    $(".acf-button").addClass("disable-btn");
                    $(".acf-button .load-more-text").hide();
                    $(".acf-button .loader").css("display", "inline-block");
                },
                success: function (data) {
                    $(".acf-button").removeClass("disable-btn");
                    $(".acf-button .load-more-text").show();
                    $(".acf-button .loader").css("display", "none");
                    $("#acf-load-content").append(data);
                    if ($datatotal <= $poststart_revise) {
                        $("#acf-button").hide();
                    }
                }
            });
        });
    });
</script>
</body>
</html>