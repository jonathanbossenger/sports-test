<?php
/**
 * Plugin Name: Sports Test
 * Plugin URI: https://github.com/jonathanbossenger/sports-test
 * Description: A plugin to manage sports related profiles
 * Version: 1.0.0
 * Author: Jonathan Bossenger
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: sports-test
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register the Athletes custom post type.
 */
function sports_test_register_athletes_cpt() {
	$labels = array(
		'name'                  => _x( 'Athletes', 'Post type general name', 'sports-test' ),
		'singular_name'         => _x( 'Athlete', 'Post type singular name', 'sports-test' ),
		'menu_name'             => _x( 'Athletes', 'Admin Menu text', 'sports-test' ),
		'name_admin_bar'        => _x( 'Athlete', 'Add New on Toolbar', 'sports-test' ),
		'add_new'               => __( 'Add New', 'sports-test' ),
		'add_new_item'          => __( 'Add New Athlete', 'sports-test' ),
		'new_item'              => __( 'New Athlete', 'sports-test' ),
		'edit_item'             => __( 'Edit Athlete', 'sports-test' ),
		'view_item'             => __( 'View Athlete', 'sports-test' ),
		'all_items'             => __( 'All Athletes', 'sports-test' ),
		'search_items'          => __( 'Search Athletes', 'sports-test' ),
		'parent_item_colon'     => __( 'Parent Athletes:', 'sports-test' ),
		'not_found'             => __( 'No athletes found.', 'sports-test' ),
		'not_found_in_trash'    => __( 'No athletes found in Trash.', 'sports-test' ),
		'featured_image'        => _x( 'Athlete Photo', 'Overrides the "Featured Image" phrase', 'sports-test' ),
		'set_featured_image'    => _x( 'Set athlete photo', 'Overrides the "Set featured image" phrase', 'sports-test' ),
		'remove_featured_image' => _x( 'Remove athlete photo', 'Overrides the "Remove featured image" phrase', 'sports-test' ),
		'use_featured_image'    => _x( 'Use as athlete photo', 'Overrides the "Use as featured image" phrase', 'sports-test' ),
		'archives'              => _x( 'Athlete archives', 'The post type archive label', 'sports-test' ),
		'insert_into_item'      => _x( 'Insert into athlete', 'Overrides the "Insert into post" phrase', 'sports-test' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this athlete', 'Overrides the "Uploaded to this post" phrase', 'sports-test' ),
		'filter_items_list'     => _x( 'Filter athletes list', 'Screen reader text for the filter links', 'sports-test' ),
		'items_list_navigation' => _x( 'Athletes list navigation', 'Screen reader text for the pagination', 'sports-test' ),
		'items_list'            => _x( 'Athletes list', 'Screen reader text for the items list', 'sports-test' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'athletes' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          => 'dashicons-groups',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'athletes', $args );
}
add_action( 'init', 'sports_test_register_athletes_cpt' );

/**
 * Flush rewrite rules on plugin activation.
 */
function sports_test_activate() {
	sports_test_register_athletes_cpt();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'sports_test_activate' );

/**
 * Flush rewrite rules on plugin deactivation.
 */
function sports_test_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'sports_test_deactivate' );
