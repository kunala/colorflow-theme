<?php 
  add_action('init', 'amenity_post_type');
  function amenity_post_type() {
  	$labels = array(
  		'name' => _x('Amenities', 'amenitys'),
  		'singular_name' => _x('Amenity', 'amenity'),
  		'add_new' => _x('Add New', 'amenity'),
  		'add_new_item' => __('Add New Amenity'),
  		'edit_item' => __('Edit Amenity'),
  		'new_item' => __('New Amenity'),
  		'view_item' => __('View Amenity'),
  		'search_items' => __('Search Amenities'),
  		'not_found' =>  __('Nothing found'),
  		'not_found_in_trash' => __('Nothing found in Trash'),
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
  		'hierarchical' => false,
  		'menu_position' => null,
  		'supports' => array('title','editor','thumbnail')
  	  ); 
  	register_post_type( 'amenity' , $args );
  }
?>