<nav aria-label="breadcrumb" class="custom-breadcrumb">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<ol class="breadcrumb">', '</ol>');
    }
    ?>
</nav>