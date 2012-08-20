<?php 
  add_action('init', 'service_post_type');
  function service_post_type() {
  	$labels = array(
  		'name' => _x('Services', 'services'),
  		'singular_name' => _x('Service', 'service'),
  		'add_new' => _x('Add New', 'service'),
  		'add_new_item' => __('Add New Service'),
  		'edit_item' => __('Edit Service'),
  		'new_item' => __('New Service'),
  		'view_item' => __('View Service'),
  		'search_items' => __('Search Services'),
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
  		'rewrite' => true,
  		'capability_type' => 'post',
  		'hierarchical' => false,
  		'menu_position' => null,
  		'supports' => array('title','editor','thumbnail')
  	  ); 
  	register_post_type( 'service' , $args );
  }
?>