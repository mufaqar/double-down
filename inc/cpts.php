<?php
function cptui_register_my_cpts_menu_items() {

	/**
	 * Post Type: Menu Items.
	 */

	$labels = [
		"name" => __( "Menu Items", "twentytwentytwo" ),
		"singular_name" => __( "Menu Item", "twentytwentytwo" ),
	];

	$args = [
		"label" => __( "Menu Items", "twentytwentytwo" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "menu_items", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "menu_items", $args );
}

add_action( 'init', 'cptui_register_my_cpts_menu_items' );

function cptui_register_my_taxes_menu_types() {

	/**
	 * Taxonomy: Types.
	 */

	$labels = [
		"name" => __( "Types", "twentytwentytwo" ),
		"singular_name" => __( "Type", "twentytwentytwo" ),
	];

	
	$args = [
		"label" => __( "Types", "twentytwentytwo" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'menu_types', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "menu_types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "menu_types", [ "menu_items" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_menu_types' );

