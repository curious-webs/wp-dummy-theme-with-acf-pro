<?php
/* * * * 
 * blog Sidebar
 */
if (is_active_sidebar('blog-sidebar')) :
    ?>
    <div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar('blog-sidebar'); ?>
    </div>
<?php endif; ?>