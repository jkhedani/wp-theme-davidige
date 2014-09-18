<?php

/**
 * 09102014 Add custom taxonomy to be shared by pages and photos
 * @author jkhedani
 * @todo Determine why this function must be called in the same file...was not
 *       registering in functions.php
 */
function davidige_register_taxonomies() {
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name'                       => _x( 'Gallery Tags', 'taxonomy general name' ),
    'singular_name'              => _x( 'Gallery Tag', 'taxonomy singular name' ),
    'search_items'               => __( 'Search Gallery Tags' ),
    'popular_items'              => __( 'Popular Gallery Tags' ),
    'all_items'                  => __( 'All Gallery Tags' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Gallery Tag' ),
    'update_item'                => __( 'Update Gallery Tag' ),
    'add_new_item'               => __( 'Add New Gallery Tag' ),
    'new_item_name'              => __( 'New Gallery Tag Name' ),
    'separate_items_with_commas' => __( 'Separate Gallery Tags with commas' ),
    'add_or_remove_items'        => __( 'Add or remove Gallery Tags' ),
    'choose_from_most_used'      => __( 'Choose from the most used Gallery Tags' ),
    'not_found'                  => __( 'No Gallery Tags found.' ),
    'menu_name'                  => __( 'Gallery Tags' ),
  );
  $args = array(
    'hierarchical'          => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    // 'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'gallery-tags' ),
  );
  register_taxonomy( 'gallery_tags', array( 'page', 'photos' ), $args );
}
add_action('init', 'davidige_register_taxonomies', 0);

/**
 * 09102014 Reference custom taxonomy to be shared by pages and photos
 * @author jkhedani
 */

add_action( 'init', 'tb_custom_post_type_photo' );
function tb_custom_post_type_photo() {
    $labels = array(
        'name' => _x( 'Photos', 'photo', 'the-cause' ),
        'singular_name' => _x( 'Photo', 'photo', 'the-cause' ),
        'add_new' => _x( 'Add New', 'photo', 'the-cause' ),
        'add_new_item' => _x( 'Add New Photo', 'photo', 'the-cause' ),
        'edit_item' => _x( 'Edit Photo', 'photo', 'the-cause' ),
        'new_item' => _x( 'New Photo', 'photo', 'the-cause' ),
        'view_item' => _x( 'View Photo', 'photo', 'the-cause' ),
        'search_items' => _x( 'Search Photos', 'photo', 'the-cause' ),
        'not_found' => _x( 'No photos found', 'photo', 'the-cause' ),
        'not_found_in_trash' => _x( 'No photos found in Trash', 'photo', 'the-cause' ),
        'parent_item_colon' => _x( 'Parent Photo:', 'photo', 'the-cause' ),
        'menu_name' => _x( 'Photos', 'photo', 'the-cause' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'page-attributes', 'thumbnail' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => get_option('tb_menu_icon'),
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'taxonomies' => array( 'gallery_tags' ),
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'photo', $args );
}
?>
