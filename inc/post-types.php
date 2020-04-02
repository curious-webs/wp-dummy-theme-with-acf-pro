<?php

function cptui_register_my_cpts_Services() {

    /**
     * Post Type: Services.
     */
    $labels = [
        "name" => __("Services", "custom-post-type-ui"),
        "singular_name" => __("Service", "custom-post-type-ui"),
        "menu_name" => __("Services", "custom-post-type-ui"),
        "all_items" => __("All Services", "custom-post-type-ui"),
        "add_new" => __("Add New", "custom-post-type-ui"),
        "add_new_item" => __("Add New Service", "custom-post-type-ui"),
        "edit_item" => __("Edit Service", "custom-post-type-ui"),
        "new_item" => __("New Service", "custom-post-type-ui"),
        "view_item" => __("View Service", "custom-post-type-ui"),
        "view_items" => __("View Services", "custom-post-type-ui"),
        "search_items" => __("Search Service", "custom-post-type-ui"),
        "not_found" => __("Not Found", "custom-post-type-ui"),
        "not_found_in_trash" => __("Not Found in Trash", "custom-post-type-ui"),
        "parent" => __("Parent Service", "custom-post-type-ui"),
        "featured_image" => __("Featured Image for Service", "custom-post-type-ui"),
        "set_featured_image" => __("Set Featured Image", "custom-post-type-ui"),
        "remove_featured_image" => __("Remive Featured Image", "custom-post-type-ui"),
        "use_featured_image" => __("Use Featured Image", "custom-post-type-ui"),
        "archives" => __("Service Archives", "custom-post-type-ui"),
        "insert_into_item" => __("Insert into Service", "custom-post-type-ui"),
        "uploaded_to_this_item" => __("Upload to this Service", "custom-post-type-ui"),
        "filter_items_list" => __("Filter Service List", "custom-post-type-ui"),
        "items_list_navigation" => __("Service List Navigation", "custom-post-type-ui"),
        "items_list" => __("Service List", "custom-post-type-ui"),
        "attributes" => __("Service Attributes", "custom-post-type-ui"),
        "name_admin_bar" => __("Service", "custom-post-type-ui"),
        "item_published" => __("Service Published", "custom-post-type-ui"),
        "item_published_privately" => __("Service Pubished Privately", "custom-post-type-ui"),
        "item_reverted_to_draft" => __("Service Reverted to Draft", "custom-post-type-ui"),
        "item_scheduled" => __("Service Scheduled", "custom-post-type-ui"),
        "item_updated" => __("Service Updated", "custom-post-type-ui"),
        "parent_item_colon" => __("Parent Service", "custom-post-type-ui"),
    ];

    $args = [
        "label" => __("Services", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => ["slug" => "services", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "comments", "revisions", "author", "page-attributes", "post-formats"],
        "taxonomies" => ["category", "post_tag","services_cat"],
    ];

    register_post_type("services", $args);
}

add_action('init', 'cptui_register_my_cpts_Services');

function cptui_register_my_taxes_services_cat() {

    /**
     * Taxonomy: services_cat.
     */
    $labels = [
        "name" => __("services_cat", "custom-post-type-ui"),
        "singular_name" => __("service_cat", "custom-post-type-ui"),
        "menu_name" => __("Services Category", "custom-post-type-ui"),
        "all_items" => __("All Services Category", "custom-post-type-ui"),
        "edit_item" => __("Edit Services Category", "custom-post-type-ui"),
        "view_item" => __("View Services Category", "custom-post-type-ui"),
        "update_item" => __("Update Services Category", "custom-post-type-ui"),
        "add_new_item" => __("Add New Services Category", "custom-post-type-ui"),
        "new_item_name" => __("New Services Category", "custom-post-type-ui"),
        "parent_item" => __("Parent Services Category", "custom-post-type-ui"),
        "parent_item_colon" => __("Parent Services Category", "custom-post-type-ui"),
        "search_items" => __("Search Services Category", "custom-post-type-ui"),
        "popular_items" => __("Popular Services Category", "custom-post-type-ui"),
        "separate_items_with_commas" => __("Services Category with Commas", "custom-post-type-ui"),
        "add_or_remove_items" => __("Add or Remove Services Category", "custom-post-type-ui"),
        "choose_from_most_used" => __("Choose from Most Used", "custom-post-type-ui"),
        "not_found" => __("No Services Category Found", "custom-post-type-ui"),
        "no_terms" => __("No Services Category", "custom-post-type-ui"),
        "items_list_navigation" => __("Services Category Navigation", "custom-post-type-ui"),
        "items_list" => __("Services Category List", "custom-post-type-ui"),
    ];

    $args = [
        "label" => __("services_cat", "custom-post-type-ui"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'services_cat', 'with_front' => true, 'hierarchical' => true,],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "services_cat",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
    ];
    register_taxonomy("services_cat", ["services"], $args);
}

add_action('init', 'cptui_register_my_taxes_services_cat');


