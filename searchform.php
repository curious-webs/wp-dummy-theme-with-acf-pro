<form role="search" method="get" id="searchform" class="searchform searchbox form-inline my-2" action="<?php echo home_url('/'); ?>" >
    <input type="text" value="<?php echo get_search_query(); ?>" placeholder="Search......" name="s" id="s" class="searchbox-input form-control mr-sm-2" required>
    <input type="submit" class="searchbox-submit btn btn-outline-success my-2 my-sm-0"  id="searchsubmit" value="<?php echo esc_attr__('Search');         ?>">
    <span class="searchbox-icon"></span>
</form>
