<?php
function cptui_register_my_cpts_trainings() {

	/**
	 * Post Type: Trainings.
	 */

	$labels = [
		"name" => __( "Trainings", "hello-elementor" ),
		"singular_name" => __( "Training", "hello-elementor" ),
	];

	$args = [
		"label" => __( "Trainings", "hello-elementor" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "trainings", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "trainings", $args );
}

add_action( 'init', 'cptui_register_my_cpts_trainings' );


function cptui_register_my_cpts_team() {

	/**
	 * Post Type: Team.
	 */

	$labels = [
		"name" => __( "Team", "hello-elementor" ),
		"singular_name" => __( "Team", "hello-elementor" ),
	];

	$args = [
		"label" => __( "Team", "hello-elementor" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "team", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "team", $args );
}

add_action( 'init', 'cptui_register_my_cpts_team' );



function cptui_register_my_cpts_matches() {

	/**
	 * Post Type: Matches.
	 */

	$labels = [
		"name" => __( "Matches", "hello-elementor" ),
		"singular_name" => __( "Match", "hello-elementor" ),
	];

	$args = [
		"label" => __( "Matches", "hello-elementor" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "matches", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "matches", $args );
}

add_action( 'init', 'cptui_register_my_cpts_matches' );
