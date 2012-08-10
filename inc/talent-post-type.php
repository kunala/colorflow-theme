<?php 
  add_action('init', 'person_post_type');
  function person_post_type() {
  	$labels = array(
  		'name' => _x('Talent', 'talent'),
  		'singular_name' => _x('Talent', 'talent'),
  		'add_new' => _x('Add New', 'person'),
  		'add_new_item' => __('Add New Color Scientist'),
  		'edit_item' => __('Edit Ol So and So'),
  		'new_item' => __('New Color Wizard'),
  		'view_item' => __('View So and So'),
  		'search_items' => __('Search Talent'),
  		'not_found' =>  __('Nobody found'),
  		'not_found_in_trash' => __('Nobody found in Trash ... phew. Why were we even looking for people in the trash?'),
  		'parent_item_colon' => ''
  	);
  	$args = array(
  		'labels' => $labels,
  		'public' => true,
  		'publicly_queryable' => false,
  		'show_ui' => true,
  		'query_var' => true,
  		#'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
  		'rewrite' => true,
  		'capability_type' => 'post',
  		'hierarchical' => true,
  		'menu_position' => null,
  		'supports' => array('title','editor','thumbnail')
  	  ); 
  	register_post_type( 'person' , $args );
  }
?>